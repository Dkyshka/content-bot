<?php

namespace App\Actions;

use App\Models\Setting;
use App\Services\MessageReplaceBrService;
use App\Services\TelegramCallbackService;
use App\Services\TelegramContactService;
use App\Services\TelegramMessageService;
use App\Services\TelegramSendingService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TelegramRouteAction
{
    public Setting $setting;

    public function __construct()
    {
        $this->setting = Setting::first();
    }

    /**
     * Обработка событий пользователя
     *
     * @param Object $data
     * @return void
     */
    public function handle(Object $data): void
    {
        try {
            $callback = $data?->callback_query ?? null;
            $chat_id = $callback ? $callback->from->id : ($data->message?->chat?->id ?? null);
            $message = $data?->message?->text ?? null;
            $contacts = $data?->message?->contact?->phone_number ?? null;
            $join = $data?->chat_join_request ?? null;
            $chat_id = $chat_id ? $chat_id : ($join?->from?->id ?? null);


            if ($message) {
                (new TelegramMessageService($chat_id))->message($message);
            } elseif($contacts) {
                (new TelegramContactService($chat_id))->process($contacts);
            } elseif($callback) {
                (new TelegramCallbackService($chat_id))->process($callback->data, $callback->id, $callback->message->message_id);
            } elseif($join) {
                Storage::append('join/1.txt', json_encode($join));
                $keyboard = [
                    [
                        [
                            'text' => "Kanalga obuna bo'lish",
                            'url' => env('TELEGRAM_BOT_CHANNEL_INVITE')
                        ]
                    ],
                    [
                        [
                            'text' => 'Shaxsiy hisob',
                            'web_app' => [
                                'url' => "https://contentclub.uz/telegram"
                            ]
                        ]
                    ],
                    [
                        [
                            'text' => '💳 Tariflar',
                            'callback_data' => 'action_tariff'
                        ],
                    ],
                    [
                        [
                            'text' => "🤵 Menejer bilan bog'lanish",
                            'url' => $this->setting->markup?->manager,
                        ]
                    ],
                    [
                        [
                            'text' => "🔎 Kanal haqida batafsil",
                            'callback_data' => 'action_about',
                        ]
                    ]
                ];

                $message = MessageReplaceBrService::replacing($this->setting->markup?->about);

                (new TelegramSendingService())
                    ->sendInlineKeyboard($chat_id, $message, $keyboard);

            }

        } catch (\Exception $e) {
            Log::error('Ошибка в обработке сообщения' . $e->getMessage());
        }
    }
}