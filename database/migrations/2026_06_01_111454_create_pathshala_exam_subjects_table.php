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
        Schema::create('pathshala_exam_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pathshala_exam_id')->constrained('pathshala_exams')->cascadeOnDelete();
            $table->foreignId('pathshala_subject_id')->constrained('pathshala_subjects')->cascadeOnDelete();
            $table->date('exam_date')->nullable();
            $table->integer('total_marks')->default(100);
            $table->integer('passing_marks')->default(30);
            $table->timestamps();
            
            $table->unique(['pathshala_exam_id', 'pathshala_subject_id'], 'exam_subject_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pathshala_exam_subjects');
    }
};
