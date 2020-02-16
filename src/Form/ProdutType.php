<?php 

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Product;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class ProductType extends AbstractType
{
    public function buildForm($builder, $options)
    {
        $choices = array("High Tech" => Product::TYPE_HIGH_TECH,"ElectroMenager" => Product::TYPE_APPLIANCE,"Cuisine" => Product::TYPE_KITCHEN,"Jeux" => Product::TYPE_GAME);
        
        $builder
            ->add('name',null,array('label' => 'Nom'))
            ->add('price',MoneyType::class,array('label' => 'Prix'))
            ->add('type',ChoiceType::class,array('label' => 'Type','choices' => $choices));
    }
}