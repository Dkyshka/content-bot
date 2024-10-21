<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); // Связь с пользователем
            $table->foreignId('plan_id'); // Связь с тарифом
            $table->timestamp('starts_at'); // Дата начала подписки
            $table->timestamp('ends_at'); // Дата окончания подписки
            $table->boolean('is_active')->default(true); // Статус подписки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
