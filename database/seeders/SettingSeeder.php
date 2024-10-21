<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'markup' => [
                'greetings' => "Assalomu alaykum 😊<br><br>Kanalga 1, 3, 6 va 12 oylik obuna tariflari bor.<br><br>Obunani xohlagan vaqtingiz bekor qilishingiz mumkin.<br><br>Sizni kanalda kutamiz 🙌🏻",
                'about' => "Информация о канале",
                'payment' => "Qulay to'lov turini tanlang:<br><br>*keyingi – siz obunangizni Bot menyusida boshqarishingiz mumkin<br>*Siz obuna tugaguniga qadar bildirishnomalarni olasiz",
                'public_offer_title' => 'Taklif shartnomasi',
                'public_offer' => 'https://azbukadoma.kg/files/uploads/opherta.pdf',
                'tariff_description' => "1 oylik obuna 75 000 so'm<br>3 oylik obuna <s>225 000 so'm</s> 200 000 so'm<br>6 oylik obuna <s>450 000 so'm</s> 400 000 so'm<br>12 oylik obuna <s>900 000 so'm</s> 750 000 so'm<br>",
                'manager' => 'https://t.me/AndrewManako',
            ]
        ]);
    }
}
