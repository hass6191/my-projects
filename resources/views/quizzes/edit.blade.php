@extends('layout')

@section('content')
<header>
    <h1 class="animate__animated animate__rubberBand">Edit Quiz</h1>
</header>

<main class="form-container">
    <form action="{{ route('quizzes.update', $quiz->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Quiz Title:</label>
        <input type="text" name="title" id="title" value="{{ $quiz->title }}" required aria-label="Quiz Title">

        <label for="category">Category:</label>
        <input type="text" name="category" id="category" value="{{ $quiz->category }}" required aria-label="Quiz Category">

        <h3>Questions:</h3>
        <div id="questions-container">
            @foreach ($quiz->questions as $index => $question)
                <div class="question">
                    <label>Question:</label>
                    <input type="text" name="questions[{{ $index }}][question]" value="{{ $question['question'] }}" required aria-label="Question {{ $index + 1 }}">

                    <label>Answer:</label>
                    <input type="text" name="questions[{{ $index }}][answer]" value="{{ $question['answer'] }}" required aria-label="Answer {{ $index + 1 }}">

                    <button type="button" class="remove-question animate__animated animate__rubberBand" onclick="removeQuestion(this)">Remove</button>
                </div>
            @endforeach
        </div>
        <button type="button" id="add-question" class="animate__animated animate__rubberBand">Add Question</button>

        <button type="submit" class="animate__animated animate__rubberBand">Update Quiz</button>
    </form>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</main>

<script>
    let questionIndex = {{ count($quiz->questions) }};

    document.getElementById('add-question').addEventListener('click', () => {
        const container = document.getElementById('questions-container');
        const newQuestion = `
            <div class="question">
                <label>Question:</label>
                <input type="text" name="questions[${questionIndex}][question]" required aria-label="New Question">

                <label>Answer:</label>
                <input type="text" name="questions[${questionIndex}][answer]" required aria-label="New Answer">

                <button type="button" class="remove-question animate__animated animate__rubberBand" onclick="removeQuestion(this)">Remove</button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newQuestion);
        questionIndex++;
    });

    function removeQuestion(button) {
        button.parentElement.remove();
    }
</script>
@endsection