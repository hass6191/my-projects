<?php

namespace Database\Factories;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3, true), // Generates a 3-word sentence in English
            'category' => $this->faker->word(),        // Generates a single random English word
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}