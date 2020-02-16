<?php 

namespace App\Util;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Product;
use App\Entity\DiscountRule;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

class DiscountPriceManager
{
    
    private $em;
    private $email;
    
    public function __construct(EntityManagerInterface $em,Email $email)
    {
        $this->em = $em;
        $this->email = $email;
    }
    
    public function setDiscountPrices()
    {
        $discountRules = $this->em->getRepository(DiscountRule::class)->findAll();
        $productsModified = array();
        
        foreach ($discountRules as $discountRule)
        {
            $discountRuleLanguage = new ExpressionLanguage();
            $expression = 'type in ["'.$discountRule->getType().'"] and price '.$discountRule->getRuleExpression().' '.$discountRule->getPriceLimit();
            $products =  $this->em->getRepository(Product::class)->findAll();
            
            foreach ($products as $product)
            {
                $productInfo = array(
                    'type' => $product->getType(),
                    'price' => $product->getPrice()
                );
                $isUpdatable = $discountRuleLanguage->evaluate(
                    $expression,
                    $productInfo
                    );
                
                if ($isUpdatable)
                {
                    $reduction = $product->getPrice() * ($discountRule->getdiscountPercent()/100);
                    $product->setDiscoutedPrice($product->getPrice()-$reduction);
                    $productsModified [] = $product;
                }
            }
        }
        
        
        $this->em->flush();
        $this->email->sendEmail($productsModified);
    }
}