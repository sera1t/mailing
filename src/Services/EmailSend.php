<?php

namespace App\Services;

use App\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

class EmailSend extends AbstractController
{
    public function __construct(
        private readonly MailerInterface $mailer
    ) {

    }

    public function send_email(Message $message)
    {
        $email = (new Email())
            ->from('test@synergy.ru')
            ->to(new Address($message->getEmail()))
            ->subject($message->getTitle())
            ->text($message->getText());
//            ->html($this->render('email/test.html.twig', [
//                'title' => $message->getTitle(),
//                'text' => $message->getText()
//            ]));
        dump($email);
        $this->mailer->send($email);
    }
}