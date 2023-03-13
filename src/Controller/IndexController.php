<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\PostType;
use App\Services\EmailSend;
use App\Services\TelegramSend;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public function __construct(
        private readonly EmailSend $emailSend,
        private readonly TelegramSend $telegramSend
    ){
    }

    #[Route('/', name: 'home_page')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(PostType::class,  new Message());
        $form->handleRequest($request);

        /* @var Message $message */
        $message = $form->getData();
        $this->telegramSend->send_tg($message);

//        if($form->isSubmitted() && $form->isValid())
//        {
//            /* @var Message $message */
//            $message = $form->getData();
//            $this->emailSend->send_email($message);
//        }


        return $this->render('mailing/mailing.html.twig', array(
            'post_form' => $form
        ));
    }

    public function api()
    {

    }
}