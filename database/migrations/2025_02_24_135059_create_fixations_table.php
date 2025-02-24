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
        Schema::create('fixations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->comment('id пользователя');
            $table->foreignId('flat_id')->constrained()->comment('id квартиры');
            $table->string('type', 70)->default("Резерв")->comment('Тип фиксации');
            $table->string('client_name', 300)->nullable()->comment('Имя клиента');
            $table->string('client_phone', 30)->nullable()->comment('Телефон клиента');
            $table->text('comment')->nullable()->comment('Телефон клиента');
            $table->string('ddu', 30)->nullable()->comment('ДДУ для продажи');
            $table->float('price', 10, 2)->nullable()->comment('Цена фиксации');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixations');
    }
};
