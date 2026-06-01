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
        Schema::create('pathshala_attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pathshala_student_id')->constrained()->cascadeOnDelete();
            $table->date('attendance_date');
            $table->string('status'); // Present, Absent, Leave
            $table->foreignId('teacher_id')->constrained('users');
            $table->timestamps();
            
            // A student can only have one attendance record per day
            $table->unique(['pathshala_student_id', 'attendance_date'], 'student_date_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pathshala_attendances');
    }
};
