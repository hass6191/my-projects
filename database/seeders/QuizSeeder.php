<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quizzes')->insert([
            [
                'title' => 'General Knowledge Quiz',
                'category' => 'General Knowledge',
                'questions' => json_encode([
                    ['question' => 'What is the capital of France?', 'answer' => 'Paris'],
                    ['question' => 'Who wrote "Hamlet"?', 'answer' => 'Shakespeare']
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
