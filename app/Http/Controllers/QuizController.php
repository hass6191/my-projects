<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz; // Model for predefined quizzes
use App\Models\CustomQuiz; // Model for custom quizzes
use App\Models\Favorite; // Model for managing favorites
use App\Models\Achievement; // Model for achievements
use App\Models\UserAchievement; // Model for user achievements
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    // Display a listing of quizzes (predefined and custom)
    public function index(Request $request)
    {
        $search = $request->input('search');
        $visibility = $request->input('visibility');

        // Fetch predefined quizzes with optional search filters
        $predefinedQuizzes = Quiz::when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('category', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Fetch custom quizzes with optional search and visibility filters
        $customQuizzes = CustomQuiz::when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('category', 'LIKE', "%{$search}%");
            })
            ->when($visibility, function ($query, $visibility) {
                return $query->where('is_public', $visibility === 'public');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Retrieve the user's favorite quizzes, if logged in
        $favorites = Auth::check() ? Auth::user()->favorites()->pluck('quiz_id')->toArray() : [];

        // Fetch achievements for the logged-in user
        $achievements = Auth::check() ? UserAchievement::where('user_id', Auth::id())
            ->with('achievement')
            ->get() : [];

        // XP and level data for the logged-in user
        $user = Auth::user();
        $xp_points = $user ? $user->xp_points : 0;
        $xp_level = $user ? $user->xp_level : 1;
        $xp_percentage = ($xp_points % 100);
        $xp_points_to_next_level = 100 - $xp_percentage;

        return view('quizzes.index', compact(
            'predefinedQuizzes',
            'customQuizzes',
            'favorites',
            'search',
            'visibility',
            'user',
            'xp_points',
            'xp_level',
            'xp_percentage',
            'xp_points_to_next_level',
            'achievements'
        ));
    }

    // Show the form for creating a new custom quiz
    public function create()
    {
        return view('quizzes.create');
    }

    // Store a new custom quiz in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'is_public' => 'required|boolean',
            'questions' => 'required|array',
            'questions.*.question' => 'required|string',
            'questions.*.answer' => 'required|string',
        ]);

        CustomQuiz::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'is_public' => $validated['is_public'],
            'questions' => json_encode($validated['questions']),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('quizzes.index')->with('success', 'Custom quiz created successfully!');
    }

    // Show the form for editing an existing custom quiz
    public function edit($id)
    {
        $customQuiz = CustomQuiz::findOrFail($id);
        $customQuiz->questions = json_decode($customQuiz->questions, true);

        return view('quizzes.edit', ['quiz' => $customQuiz]);
    }

    // Update an existing custom quiz in the database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'questions' => 'required|array',
            'questions.*.question' => 'required|string',
            'questions.*.answer' => 'required|string',
        ]);

        $customQuiz = CustomQuiz::findOrFail($id);
        $customQuiz->update([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'questions' => json_encode($validated['questions']),
        ]);

        return redirect()->route('quizzes.index')->with('success', 'Custom quiz updated successfully!');
    }

    // Delete an existing custom quiz from the database
    public function destroy($id)
    {
        $customQuiz = CustomQuiz::findOrFail($id);
        $customQuiz->delete();

        return redirect()->route('quizzes.index')->with('success', 'Custom quiz deleted successfully!');
    }

    // Start a quiz (predefined or custom)
    public function startQuiz($id)
    {
        $quiz = CustomQuiz::find($id) ?? Quiz::findOrFail($id);
        $questions = json_decode($quiz->questions, true);

        if (!is_array($questions) || empty($questions)) {
            return redirect()->route('quizzes.index')->with('error', 'This quiz has no questions.');
        }

        session()->put('quiz', [
            'id' => $quiz->id,
            'title' => $quiz->title,
            'category' => $quiz->category,
            'questions' => $questions,
            'current' => 0,
            'score' => 0,
            'type' => $quiz instanceof CustomQuiz ? 'custom' : 'predefined',
        ]);

        return view('quizzes.play', [
            'question' => $questions[0],
            'quiz' => session()->get('quiz'),
        ]);
    }

    // Submit an answer for a quiz
    public function submitAnswer(Request $request, $id)
    {
        $quizSession = session()->get('quiz');
        $questions = $quizSession['questions'];
        $currentIndex = $quizSession['current'];

        if ($currentIndex >= count($questions)) {
            return redirect()->route('quizzes.result');
        }

        $feedback = '';

        if ($request->input('timeout') == 1) {
            $feedback = "Time's up! No points for this question.";
        } else {
            $request->validate(['answer' => 'required|string']);
            if (
                strtolower(trim($request->input('answer'))) ===
                strtolower(trim($questions[$currentIndex]['answer']))
            ) {
                $quizSession['score']++;
                Auth::user()->increment('xp_points'); // Award XP for correct answer
                $feedback = "Correct! Well done.";
            } else {
                $feedback = "Incorrect! Better luck next time.";
            }
        }

        $currentIndex++;
        $quizSession['current'] = $currentIndex;
        session()->put('quiz', $quizSession);

        if ($currentIndex < count($questions)) {
            return view('quizzes.play', [
                'question' => $questions[$currentIndex],
                'quiz' => $quizSession,
                'feedback' => $feedback,
            ]);
        }

        return redirect()->route('quizzes.result');
    }

    // Show the result after completing a quiz
    public function showResult()
    {
        $quizSession = session()->get('quiz');
        $score = $quizSession['score'];
        $total = count($quizSession['questions']);

        session()->forget('quiz');

        return view('quizzes.result', compact('score', 'total'));
    }

    // Add a quiz to favorites
    public function favorite($id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to favorite a quiz.');
        }

        if (!$user->favorites()->where('quiz_id', $id)->exists()) {
            $user->favorites()->create(['quiz_id' => $id]);
            return redirect()->back()->with('success', 'Quiz added to favorites!');
        }

        return redirect()->back()->with('message', 'Quiz is already in favorites.');
    }

    // Remove a quiz from favorites
    public function unfavorite($id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to unfavorite a quiz.');
        }

        $user->favorites()->where('quiz_id', $id)->delete();

        return redirect()->back()->with('success', 'Quiz removed from favorites!');
    }

    // Display the user's favorite quizzes
    public function favoriteIndex()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to view favorites.');
        }

        $favorites = $user->favorites()->with('quiz')->get();

        return view('quizzes.favorites', compact('favorites'));
    }

    // Toggle quiz visibility (public/private)
    public function toggleVisibility($id)
    {
        $quiz = CustomQuiz::findOrFail($id);

        // Ensure only the creator can toggle visibility
        if (Auth::id() !== $quiz->user_id) {
            return redirect()->route('quizzes.index')->with('error', 'Unauthorized action.');
        }

        $quiz->is_public = !$quiz->is_public;
        $quiz->save();

        $status = $quiz->is_public ? 'public' : 'private';

        return redirect()->route('quizzes.index')->with('success', "Quiz visibility updated to {$status}.");
    }
}
