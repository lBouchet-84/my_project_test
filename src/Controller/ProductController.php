<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductType;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/produit")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/editer/{id}", name="product_edit")
     * @Route("/creer", name="product_create")
     */
    public function create(Request $request,$id=null)
    {
        if ($id == null)
        {
            $product = new Product();
        }
        else 
        {
            $product = $this->getDoctrine()->getRepository(Product::class)->find($id);    
        }
        
        $form = $this->createForm(ProductType::class,$product);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            
            $this->addFlash('success','Le produit a bien ete enregistre');
            return $this->redirectToRoute('product_list');
        }
        
        
        return $this->render('product/create.html.twig',array(
            'form' => $form->createView(),    
        ));
        
    }
    
    /**
     * @Route("/liste", name="product_list")
     */
    public function list()
    {
        $products = $this->getDoctrine()->getRepository(Product::class)->findAll();
        
        return $this->render('product/list.html.twig',array(
            'products' => $products,
        ));
    }
}