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
        Schema::table('fixations', function (Blueprint $table) {
            $table->boolean('no_pact')->default(false)->comment('Нет договора');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fixations', function (Blueprint $table) {
            $table->dropColumn('no_pact');
        });
    }
};
