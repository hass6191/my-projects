<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\GameModeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Home route (Welcome page)
Route::get('/', function () {
    return view('welcome');
})->name('home'); // Ensure this route is named 'home' for redirects

// Authenticated and Verified Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile management
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Quiz management
    Route::resource('quizzes', QuizController::class)->except(['show']);
    Route::get('quizzes/{quiz}/play', [QuizController::class, 'startQuiz'])->name('quizzes.play');
    Route::post('quizzes/{quiz}/play', [QuizController::class, 'submitAnswer'])->name('quizzes.submit');
    Route::get('quizzes/result', [QuizController::class, 'showResult'])->name('quizzes.result');

    // Favorite management
    Route::post('quizzes/{quiz}/favorite', [QuizController::class, 'favorite'])->name('quizzes.favorite');
    Route::post('quizzes/{quiz}/unfavorite', [QuizController::class, 'unfavorite'])->name('quizzes.unfavorite');
    Route::get('/favorites', [QuizController::class, 'favoriteIndex'])->name('quizzes.favorites');

    // Toggle visibility
    Route::patch('quizzes/{quiz}/toggle-visibility', [QuizController::class, 'toggleVisibility'])->name('quizzes.toggleVisibility');

    // Game mode routes
    Route::prefix('game-mode')->group(function () {
        Route::get('/', [GameModeController::class, 'index'])->name('gameMode.index');
        Route::get('/{level}/play', [GameModeController::class, 'play'])->name('gameMode.play');
        Route::post('/{level}/submit', [GameModeController::class, 'submitAnswer'])->name('gameMode.submit');
        Route::get('/result', [GameModeController::class, 'result'])->name('gameMode.result');
    });
});

// Email Verification Routes
Route::middleware(['auth'])->group(function () {
    // Email verification notice
    Route::get('/email/verify', function () {
        return view('auth.verify-email')->with('message', 'Please verify your email to continue.');
    })->name('verification.notice');

    // Verify email address
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        // Redirect to home with success message
        return redirect()->route('home')->with('status', 'Email verified successfully!');
    })->middleware(['signed'])->name('verification.verify');

    // Resend verification email
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    })->middleware(['throttle:6,1'])->name('verification.send');
});

// Include authentication routes
require __DIR__ . '/auth.php';

// Redirect authenticated users to the welcome page after login
Route::get('/redirect-after-login', function () {
    return redirect()->route('home'); // Redirect to the welcome page
})->middleware(['auth'])->name('redirect.after.login');

// Fallback route for invalid URLs
Route::fallback(function () {
    return redirect('/')->with('error', 'Page not found!');
});