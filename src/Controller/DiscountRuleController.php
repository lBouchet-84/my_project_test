<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\DiscountRuleType;
use App\Entity\DiscountRule;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

/**
 * @Route("/regle-reduction")
 */
class DiscountRuleController extends AbstractController
{
    
    /**
     * @Route("/creer", name="discount_rule_create")
     */
    public function create(Request $request)
    {
        $discountRule = new DiscountRule();
        
        $form  = $this->createForm(DiscountRuleType::class,$discountRule);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($discountRule);
            $em->flush();
            
            $this->addFlash('success', 'La regle a bien ete enregistre');
            
            return $this->redirectToRoute('discount_rule_list');
        }
        
        return $this->render('discount-rule/create.html.twig',array(
            'form' => $form->createView(),   
        ));
    }
    
    /**
     * @Route("/liste", name="discount_rule_list")
     */
    public function list(Request $request)
    {
        $discountRules = $this->getDoctrine()->getRepository(DiscountRule::class)->findAll();
        $product = new Product();
        
        return $this->render('discount-rule/list.html.twig',array(
            'discountRules' => $discountRules,
            'product' => $product,
        ));
    }
}