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
    Schema::table('users', function (Blueprint $table) {
        $table->integer('age')->nullable();
        $table->tinyInteger('gender_encoded')->nullable();
        $table->float('attendance_percentage')->nullable();
        $table->float('mental_health_rating')->nullable();
        $table->float('exam_score')->nullable();
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'age', 
            'gender_encoded', 
            'attendance_percentage', 
            'mental_health_rating', 
            'exam_score'
        ]);
    });
}

};
