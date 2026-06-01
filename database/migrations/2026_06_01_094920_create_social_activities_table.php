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
        Schema::create('social_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->date('date');
            $table->string('location');
            $table->integer('beneficiary_count')->default(0);
            $table->json('images')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_activities');
    }
};
