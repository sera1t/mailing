<?php

namespace App\Services;

use Symfony\Component\Notifier\Bridge\Telegram\Reply\Markup\Button\InlineKeyboardButton;
use Symfony\Component\Notifier\Bridge\Telegram\Reply\Markup\InlineKeyboardMarkup;
use Symfony\Component\Notifier\Bridge\Telegram\TelegramOptions;
use Symfony\Component\Notifier\ChatterInterface;
use Symfony\Component\Notifier\Message\ChatMessage;

class TelegramSend
{
    public function __construct(
        private readonly ChatterInterface $chatter
    ) {

    }

    public function send_tg() {

        $telegramOptions = (new TelegramOptions())
             ->chatId('903015467')
             ->disableWebPagePreview(true)
             ->disableNotification(true)
             ->replyMarkup((new InlineKeyboardMarkup())
                  ->inlineKeyboard([
                    (new InlineKeyboardButton('Visit symfony.com'))
                       ->url('https://symfony.com/'),
                    ])
             );
        $chatMessage = new ChatMessage('123', $telegramOptions);
        $this->chatter->send($chatMessage->transport('telegram'));
    }
}