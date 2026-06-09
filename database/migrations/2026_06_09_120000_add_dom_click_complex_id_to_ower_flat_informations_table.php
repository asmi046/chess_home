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
        Schema::table('ower_flat_informations', function (Blueprint $table) {
            $table->string('dom_click_complex_id')->nullable()->after('longitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ower_flat_informations', function (Blueprint $table) {
            $table->dropColumn('dom_click_complex_id');
        });
    }
};
