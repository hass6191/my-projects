<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomQuiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'questions', // J
        'type',      // Default is 'custom'
    ];

    protected $casts = [
        'questions' => 'array', // Ensure questions are always handled as arrays
    ];

    public function attempts()
    {
        return $this->hasMany(Attempt::class, 'quiz_id');
    }
}