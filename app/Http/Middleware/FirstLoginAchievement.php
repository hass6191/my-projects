<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAchievement;

class FirstLoginAchievement
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user already has the "First Login" achievement
            if (!UserAchievement::where('user_id', $user->id)
                ->where('achievement_id', 4) // Assuming 4 is the ID for "First Login"
                ->exists()) 
            {
                UserAchievement::create([
                    'user_id' => $user->id,
                    'achievement_id' => 4,
                ]);
            }
        }

        return $next($request);
    }
}