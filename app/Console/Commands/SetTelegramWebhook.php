<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram\Bot\Laravel\Facades\Telegram;

class SetTelegramWebhook extends Command
{
    protected $signature = 'telegram:set-webhook';

    protected $description = 'Set the Telegram bot webhook';

    public function handle()
    {
        $response = Telegram::setWebhook(['url' => 'http://127.0.0.1:8000//telegram/start']);
        $this->info('Webhook set successfully: ' . $response->getBody()->getContents());
    }
}
