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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // The user who registered
            
            $table->string('registration_no')->unique();
            $table->string('name');
            $table->date('dob');
            $table->enum('gender', ['Male', 'Female']);
            $table->integer('age_at_registration');
            
            $table->string('parent_name');
            $table->string('parent_mobile');
            $table->string('parent_aadhaar')->nullable();
            
            $table->foreignId('state_id')->nullable()->constrained('states');
            $table->foreignId('district_id')->nullable()->constrained('districts');
            $table->foreignId('block_id')->nullable()->constrained('blocks');
            $table->foreignId('panchayat_id')->nullable()->constrained('panchayats');
            $table->foreignId('village_id')->nullable()->constrained('villages');
            $table->text('address')->nullable();
            
            $table->string('aadhaar_photo')->nullable();
            $table->string('birth_certificate_photo')->nullable();
            $table->string('child_photo')->nullable();
            
            $table->decimal('registration_fee', 10, 2); // 500 or 1000
            $table->string('qr_code')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('children');
    }
};
