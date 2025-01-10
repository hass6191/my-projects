<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Quiz;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 users
        User::factory(10)->create();

        // Create 5 quizzes with meaningful titles and categories
        Quiz::factory(5)->create();

        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}