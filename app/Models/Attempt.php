<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'user_id', 'score'];

    // Relationship with Quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}