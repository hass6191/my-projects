<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->json('questions')->nullable(); // Storing JSON-based questions
            $table->boolean('is_public')->default(0);
            $table->string('type')->default('custom'); // 'custom' or 'predefined'
            $table->boolean('is_challenge_mode')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
};

