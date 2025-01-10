<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Achievement;

class AchievementSeeder extends Seeder
{
    public function run()
    {
        Achievement::create([
            'title' => 'First Login',
            'description' => 'Logged in for the first time!',
            'criteria' => json_encode(['event' => 'login']), // Example criteria
        ]);

        Achievement::create([
            'title' => 'First Quiz Played',
            'description' => 'Played your first quiz!',
            'criteria' => json_encode(['event' => 'quiz_played']), // Example criteria
        ]);
    }
}