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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('event_name')->comment('Имя события');
            $table->string('ip')->comment('ip адрес');
            $table->string('user_name')->comment('Имя пользователя');
            $table->integer('user_id')->comment('id пользователя');
            $table->string('user_email')->comment('id пользователя');
            $table->string('user_phone')->comment('id пользователя');
            $table->string('section_id')->nullable()->comment('id секции');
            $table->string('section_name')->nullable()->comment('Номер секции');
            $table->string('flat_number')->nullable()->comment('Номер квартиры');
            $table->string('flat_type')->nullable()->comment('Тип квартиры');
            $table->float('flat_price', 10, 2)->nullable()->comment('Цена квартиры');
            $table->string('client_name', 300)->nullable()->comment('Имя клиента');
            $table->string('client_phone')->nullable()->comment('Телефон клиента');
            $table->text('fixation_comment')->nullable()->comment('Комментарий при фиксации');
            $table->string('fixation_ddu',30)->nullable()->comment('ДДУ');
            $table->float('fixation_price', 10, 2)->nullable()->comment('Цена фиксации');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
