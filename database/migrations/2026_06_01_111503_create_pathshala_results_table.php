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
        Schema::create('pathshala_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pathshala_exam_subject_id')->constrained('pathshala_exam_subjects')->cascadeOnDelete();
            $table->foreignId('pathshala_student_id')->constrained('pathshala_students')->cascadeOnDelete();
            $table->decimal('marks_obtained', 5, 2);
            $table->string('grade')->nullable();
            $table->text('remarks')->nullable();
            $table->foreignId('teacher_id')->constrained('users');
            $table->timestamps();
            
            // One result per student per exam subject
            $table->unique(['pathshala_exam_subject_id', 'pathshala_student_id'], 'result_unique_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pathshala_results');
    }
};
