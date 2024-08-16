<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Telegram
{
    protected $http;
    protected $bot;
    const url='https://api.telegram.org/bot';
    public function __construct(Http $http,$bot)
    {
        $this->http=$http;
        $this->bot=$bot;
    }

    public function sendMessage($message, $parseMode = 'HTML'){
        $response = $this->http::get(self::url.$this->bot."/getUpdates");
        $updates = json_decode($response->body(), true);

        $chatIds = [];

        if (isset($updates['result'])) {
            foreach ($updates['result'] as $update) {
                if (isset($update['message']['chat']['id'])) {
                    $chatId = $update['message']['chat']['id'];
                    if (!in_array($chatId, $chatIds)) {
                        $chatIds[] = $chatId;
                    }
                }
            }
        }
        // Відправка повідомлень
        foreach ($chatIds as $chatId) {
            $this->http::post(self::url . $this->bot . "/sendMessage", [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => $parseMode, // Додаємо parse_mode
            ]);
        }
    }
}
