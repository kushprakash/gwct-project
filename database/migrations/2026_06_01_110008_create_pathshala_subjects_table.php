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
        Schema::create('pathshala_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('class_level'); // 1 to 5
            $table->string('status')->default('Active'); // Active or Inactive
            $table->timestamps();
            
            // A subject name should be unique per class
            $table->unique(['name', 'class_level'], 'subject_class_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pathshala_subjects');
    }
};
