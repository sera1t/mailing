<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\PostType;
use App\Repository\MessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{

    #[Route('/', name: 'home_page')]
    public function index(Request $request)
    {
        $message = new Message();

        $form = $this->createFormBuilder($message);



        return $this->render('mailing/mailing.html.twig', array(
//            'post_form' => $form->createView()
        ));
    }
}