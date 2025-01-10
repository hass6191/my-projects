@extends('layout')

@section('content')
<header>
    <h1>{{ $quiz['title'] }}</h1>
    <p>Category: {{ $quiz['category'] }}</p>
</header>

<main>
    <!-- Feedback Section -->
    @if(isset($feedback))
        <div class="feedback">
            <p class="{{ strtolower(str_replace(' ', '-', $feedback)) }}">{{ $feedback }}</p>
        </div>
    @endif

    <!-- Progress Bar -->
    @php
        $totalQuestions = is_array($quiz['questions']) ? count($quiz['questions']) : 0;
    @endphp

    <div class="progress">
        <div class="progress-bar" style="width: {{ $totalQuestions > 0 ? (($quiz['current'] + 1) / $totalQuestions) * 100 : 0 }}%;"></div>
    </div>

    <h2>Question {{ $quiz['current'] + 1 }}</h2>
    <p>{{ $question['question'] }}</p>

    <!-- Timer -->
    <p><strong>Time Left: <span id="timer" style="color: green;">30</span> seconds</strong></p>

    <!-- Pause/Resume Buttons -->
    <div class="timer-controls">
        <button type="button" id="pause-btn">Pause</button>
        <button type="button" id="resume-btn" style="display: none;">Resume</button>
    </div>

    <form action="{{ route('quizzes.submit', $quiz['id']) }}" method="POST" id="quiz-form">
        @csrf
        <input type="hidden" name="timeout" id="timeout" value="0"> <!-- Timeout status -->
        <label for="answer">Your Answer:</label>
        <input type="text" name="answer" id="answer" required>
        <button type="submit">Submit</button>
    </form>
</main>

<script>
    let timeLeft = 30;
    let isPaused = false;

    const timerElement = document.getElementById('timer');
    const quizForm = document.getElementById('quiz-form');
    const timeoutInput = document.getElementById('timeout');
    const pauseButton = document.getElementById('pause-btn');
    const resumeButton = document.getElementById('resume-btn');

    const countdown = setInterval(() => {
        if (!isPaused && timeLeft > 0) {
            timeLeft--;
            timerElement.textContent = timeLeft;

            if (timeLeft <= 10) timerElement.style.color = 'red';
            else if (timeLeft <= 20) timerElement.style.color = 'orange';
        } else if (!isPaused && timeLeft <= 0) {
            clearInterval(countdown);
            timeoutInput.value = 1;
            quizForm.submit();
        }
    }, 1000);

    pauseButton.addEventListener('click', () => {
        isPaused = true;
        pauseButton.style.display = 'none';
        resumeButton.style.display = 'inline-block';
    });

    resumeButton.addEventListener('click', () => {
        isPaused = false;
        resumeButton.style.display = 'none';
        pauseButton.style.display = 'inline-block';
    });
</script>
@endsection