<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAchievement extends Model
{
    use HasFactory;

    protected $table = 'user_achievements'; // Ensure this matches the actual table name

    protected $fillable = [
        'user_id',
        'achievement_id',
        'created_at',
        'updated_at',
    ];

    // Define the relationship with Achievement
    public function achievement()
    {
        return $this->belongsTo(Achievement::class);
    }
}