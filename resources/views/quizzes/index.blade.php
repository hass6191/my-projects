@extends('layout')

@section('content')
<header>
    <h1>Explore Quizzes</h1>
    <p>Choose from quick play quizzes, gain XP, create your own, or view your favorite quizzes!</p>
    <div class="buttons">
    <nav>
            <a href="{{ route('quizzes.index') }}" class="hover-animate">Home</a>
            
        <a href="{{ route('quizzes.create') }}" class="btn">Create a Quiz</a>
        <a href="{{ route('quizzes.favorites') }}" class="btn">View Favorites</a>
        
        
    </div>
</header>

<main class="flex-container">
    <!-- Left Content -->
    <div class="left-content">
        <!-- Search Bar -->
        <form action="{{ route('quizzes.index') }}" method="GET" class="search-bar">
            <input 
                type="text" 
                name="search" 
                value="{{ $search ?? '' }}" 
                placeholder="Search quizzes by title or category"
            >
            <select name="visibility" class="filter-select">
                <option value="">All</option>
                <option value="public" {{ request('visibility') === 'public' ? 'selected' : '' }}>Public</option>
                <option value="private" {{ request('visibility') === 'private' ? 'selected' : '' }}>Private</option>
            </select>
            <button type="submit" class="btn">Search</button>
        </form>

        <!-- Quick Play Quizzes -->
        <h2>Quick Play Quizzes</h2>
        @if($predefinedQuizzes->isEmpty())
            <p>No quick play quizzes match your search.</p>
        @else
            <table class="quiz-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($predefinedQuizzes as $quiz)
                        <tr>
                            <td>{{ $quiz->title }}</td>
                            <td>{{ $quiz->category }}</td>
                            <td>
                                <a href="{{ route('quizzes.play', $quiz->id) }}" class="btn">Play</a>
                                @if(auth()->check() && in_array($quiz->id, $favorites))
                                    <form action="{{ route('quizzes.unfavorite', $quiz->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn">Unfavorite</button>
                                    </form>
                                @else
                                    <form action="{{ route('quizzes.favorite', $quiz->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn">Favorite</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <!-- Custom Quizzes -->
        <h2>Custom Quizzes</h2>
        @if($customQuizzes->isEmpty())
            <p>No custom quizzes match your search.</p>
        @else
            <table class="quiz-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customQuizzes as $quiz)
                        <tr>
                            <td>{{ $quiz->title }}</td>
                            <td>{{ $quiz->category }}</td>
                            <td>{{ $quiz->is_public ? 'Public' : 'Private' }}</td>
                            <td>
                                <a href="{{ route('quizzes.play', $quiz->id) }}" class="btn">Play</a>
                                <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn">Edit</a>
                                <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Right Content -->
    <div class="right-panel">
        <!-- XP Progress Section -->
        <div class="card xp-section">
            <h2>Your XP Progress</h2>
            <p><strong>Level:</strong> {{ $user->xp_level }}</p>
            <p><strong>XP Points:</strong> {{ $user->xp_points }}</p>
            <div class="xp-bar">
                <div class="xp-progress" style="width: {{ $xp_percentage }}%;" data-percentage="{{ $xp_percentage }}"></div>
            </div>
            <p>{{ $xp_points_to_next_level }} XP points to reach the next level!</p>
        </div>

        <!-- Achievements Section -->
        <div class="card achievements">
            <h2>Your Achievements</h2>
            <ul>
                <li>🏆 First Login - Logged in for the first time!</li>
                <li>🎯 First Quiz Played - Played your first quiz!</li>
             
            </ul>
        </div>

        <!-- Upcoming Challenges Section -->
        <div class="card upcoming-challenges">
            <h2>Upcoming Quizzes or Challenges</h2>
            <ul>
                <li>📅 Weekend Challenge: Complete 3 quizzes to earn a bonus badge!</li>
                <li>🧠 Brain Teaser Tuesday: Participate in the logic quiz to win XP!</li>
                <li>💪 Trivia Thursday: Play quizzes in the History category for double XP!</li>
            </ul>
        </div>
    </div>
</main>
@endsection