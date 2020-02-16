<?php 

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Product;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use App\Entity\DiscountRule;

class DiscountRuleType extends AbstractType
{
    public function buildForm($builder, $options)
    {
        $types = array("High Tech" => Product::TYPE_HIGH_TECH,"ElectroMenager" => Product::TYPE_APPLIANCE,"Cuisine" => Product::TYPE_KITCHEN,"Jeux" => Product::TYPE_GAME);
        $rules = array(
            DiscountRule::RULE_LOWER => DiscountRule::RULE_LOWER,
            DiscountRule::RULE_LOWER_OR_EQUAL => DiscountRule::RULE_LOWER_OR_EQUAL,
            DiscountRule::RULE_MORE => DiscountRule::RULE_MORE,
            DiscountRule::RULE_MORE_OR_EQUAL => DiscountRule::RULE_MORE_OR_EQUAL
        );
        
        $percentages = array();
        for($i=1;$i<=50;$i++)
        {
            $percentages[$i.'%'] = $i;
        }
        
        $builder
            ->add('type',ChoiceType::class,array('placeholder'=> '','label' =>'Type de produit concerne','choices' => $types))
            ->add('ruleExpression',ChoiceType::class,array('placeholder'=> '','label' => 'Type de regle','choices' => $rules))
            ->add('priceLimit',null,array('label' => 'Sur prix'))
            ->add('discountPercent',ChoiceType::class,array('placeholder'=> '','label' => 'Pourcentage de reduction','choices' => $percentages));
    }
}