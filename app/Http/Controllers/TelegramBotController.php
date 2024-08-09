<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotController extends Controller
{
    public function start()
    {
        $updates = Telegram::getUpdates();

        foreach ($updates as $update) {
            $chatId = $update->getMessage()->getChat()->getId();
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text'    => 'Привет! Я ваш бот на Laravel.',
            ]);
        }
    }

    public function handleLongPolling()
    {
        // Отримання оновлень
        $updates = Telegram::getUpdates();

        foreach ($updates as $update) {
            // Обробка кожного оновлення
            $chatId = $update->getMessage()->getChat()->getId();
            $message = $update->getMessage()->getText();

            // Відправка відповіді
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text'    => 'Ви написали: ' . $message,
            ]);
        }

        // Затримка між запитами, щоб уникнути перевантаження
        sleep(2);
    }
}
