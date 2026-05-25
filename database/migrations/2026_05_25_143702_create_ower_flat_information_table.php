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
        Schema::create('ower_flat_informations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type', 50)->unique()->comment('Тип квартиры (slug)');
            $table->json('gallery')->nullable()->comment('Галерея квартиры');
            $table->string('address')->nullable()->comment('Адрес');
            $table->string('city')->nullable()->comment('Город');
            $table->string('country')->nullable()->comment('Страна');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ower_flat_informations');
    }
};
