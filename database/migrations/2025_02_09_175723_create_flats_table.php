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
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('section_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('floor')->comment('Этаж');
            $table->integer('number')->comment('Номер квартиры');
            $table->string('type', 40)->comment('Тип квартиры');
            $table->float('area1', 6, 2)->comment('Полощадь 1');
            $table->float('area2', 6, 2)->comment('Полощадь 2');
            $table->float('area3', 6, 2)->comment('Полощадь 3');
            $table->float('price_per_meter', 6, 2)->comment('Цена за метр');
            $table->float('price_total', 10, 2)->comment('Цена общая');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
