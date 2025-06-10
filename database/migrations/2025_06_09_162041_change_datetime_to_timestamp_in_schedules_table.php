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
        Schema::table('schedules', function (Blueprint $table) {
            // Mengubah tipe kolom ke timestamp
            $table->timestamp('start_time')->change();
            $table->timestamp('end_time')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            // Mengembalikan tipe kolom ke dateTime jika migrasi di-rollback
            $table->dateTime('start_time')->change();
            $table->dateTime('end_time')->change();
        });
    }
};
