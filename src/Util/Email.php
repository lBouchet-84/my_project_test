<?php 

namespace App\Util;


use Twig\Template;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Twig\Environment;


class Email
{
    private $mailer;
    private $twig;
    
    public function __construct(\Swift_Mailer $mailer,Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }
    
    public function sendEmail($products)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('lucas.bouchet@neuf.fr')
            ->setTo('lucas.bouchet@neuf.fr')
            ->setBody(
                $this->twig->render(
                    'emails/updateProducts.html.twig',
                    ['products' => $products]
                    ),
                'text/html'
                );
        
        $this->mailer->send($message);
    }
}