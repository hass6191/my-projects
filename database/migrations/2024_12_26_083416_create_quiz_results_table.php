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
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade'); // Foreign key to users table, cascades on delete
            $table->foreignId('quiz_id')
                ->constrained()
                ->onDelete('cascade'); // Foreign key to quizzes table, cascades on delete
            $table->integer('score'); // Stores the quiz score
            $table->integer('experience_earned'); // XP earned for completing the quiz
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_results'); // Drops the quiz_results table
    }
};
