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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->comment('Имя секции');
            $table->integer('number')->comment('Номер секции');
            $table->integer('floor_count')->comment('Количество этажэй');
            $table->float('area_total', 6, 2)->nullable()->comment('Суммарная площадь');
            $table->string('adress')->nullable()->comment('Адрес секции');
            $table->string('geo', 100)->nullable()->comment('GEO');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
