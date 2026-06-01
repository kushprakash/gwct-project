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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_title')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('authorized_signatory')->nullable();
            $table->string('authorized_signatory_sign')->nullable();
            $table->text('account_details')->nullable();
            $table->json('sms_config')->nullable();
            $table->json('email_config')->nullable();
            $table->json('theme_colors')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
