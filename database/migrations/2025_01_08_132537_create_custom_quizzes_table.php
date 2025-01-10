<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_quizzes', function (Blueprint $table) {
            $table->id(); // Auto-increment ID
            $table->string('title'); // Title of the quiz
            $table->string('category'); // Category of the quiz
            $table->json('questions'); // Questions stored as JSON
            $table->string('type')->default('custom'); // Type of quiz (e.g., custom)
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_quizzes');
    }
}