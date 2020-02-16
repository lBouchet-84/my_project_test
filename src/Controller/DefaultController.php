<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Util\Email;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function index(Email $email)
    {
        return$this->render('index.html.twig');
    }
}