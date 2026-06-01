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
        Schema::create('pathshala_students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->unique();
            $table->string('name');
            $table->date('dob');
            $table->string('gender');
            $table->string('father_name');
            $table->string('mother_name')->nullable();
            $table->string('mobile');
            $table->text('address')->nullable();
            
            // Location relations
            $table->foreignId('state_id')->nullable()->constrained();
            $table->foreignId('district_id')->nullable()->constrained();
            $table->foreignId('block_id')->nullable()->constrained();
            $table->foreignId('panchayat_id')->nullable()->constrained();
            $table->foreignId('village_id')->nullable()->constrained();
            
            $table->string('photo')->nullable();
            $table->string('status')->default('Active'); // Active, Graduated, Dropout
            
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pathshala_students');
    }
};
