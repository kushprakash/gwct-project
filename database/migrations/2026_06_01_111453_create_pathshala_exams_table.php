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
        Schema::create('pathshala_exams', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. Mid Term, Final Exam
            $table->integer('class_level');
            $table->string('session_year'); // e.g. 2024-2025
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pathshala_exams');
    }
};
