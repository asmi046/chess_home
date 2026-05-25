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
        Schema::table('flats', function (Blueprint $table) {
            $table->string('ower_flat_type', 50)
                ->nullable()
                ->after('type')
                ->comment('Связь с ower_flat_informations.type');

            $table->index('ower_flat_type');
            $table->foreign('ower_flat_type')
                ->references('type')
                ->on('ower_flat_informations')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('flats', function (Blueprint $table) {
            $table->dropForeign(['ower_flat_type']);
            $table->dropIndex(['ower_flat_type']);
            $table->dropColumn('ower_flat_type');
        });
    }
};
