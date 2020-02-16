<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Product;
use App\Entity\DiscountRule;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new Product();
        $product->setName('Premier produit');
        $product->setPrice(100);
        $product->setType(Product::TYPE_KITCHEN);
        $manager->persist($product);
        
        $secondProduct = new Product();
        $secondProduct->setName('Deuxieme produit');
        $secondProduct->setPrice(150);
        $secondProduct->setType(Product::TYPE_APPLIANCE);
        $manager->persist( $secondProduct);
        
        $thirdProduct = new Product();
        $thirdProduct->setName('Troisieme produit');
        $thirdProduct->setPrice(200);
        $thirdProduct->setType(Product::TYPE_GAME);
        $manager->persist($thirdProduct);
        
        $firstRule = new DiscountRule();
        $firstRule->setType(Product::TYPE_KITCHEN);
        $firstRule->setRuleExpression(DiscountRule::RULE_LOWER);
        $firstRule->setPriceLimit(200);
        $firstRule->setDiscountPercent(25);
        $manager->persist($firstRule);
        
        $secondRule = new DiscountRule();
        $secondRule->setType(Product::TYPE_GAME);
        $secondRule->setRuleExpression(DiscountRule::RULE_MORE_OR_EQUAL);
        $secondRule->setPriceLimit(100);
        $secondRule->setDiscountPercent(18);
        $manager->persist($secondRule);

        $manager->flush();
    }
}
