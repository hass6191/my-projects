<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'question_text'];

    // Relationship with Quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Relationship with Options
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}