<?php

namespace App\Services;

use App\Actions\CheckLocaleMessageAction;
use App\Actions\UserUpdateStepAction;
use App\Models\Setting;
use App\Models\User;
use App\Services\Referrer\TelegramReferrerService;
use Illuminate\Support\Facades\Storage;

class TelegramAuthService
{
    public User $user;
    public Setting $setting;

    public function create(int $chat_id, string $name, string $message)
    {
        $this->setting = Setting::first();

        $this->user = User::create([
            'chat_id' => $chat_id,
            'name' => $name,
            'in_auth' => true,
        ]);

        $parts = explode(' ', $message); // Разделяем текст по пробелу

        $token = $parts[1] ?? null; // Токен находится после пробела

        if ($token) {
            TelegramReferrerService::checkReferrer($this->user, $token);
        }

        (new TelegramActionsService($this->user, $this->setting))->main();
    }
}