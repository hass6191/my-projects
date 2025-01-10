@extends('layout')

@section('content')
<header>
    <h1>Create a Quiz</h1>
</header>

<main>
    <form action="{{ route('quizzes.store') }}" method="POST">
        @csrf

        <!-- Quiz Title -->
        <label for="title">Quiz Title:</label>
        <input type="text" name="title" id="title" required>

        <!-- Quiz Category -->
        <label for="category">Category:</label>
        <input type="text" name="category" id="category" required>

        <!-- Visibility Toggle -->
        <label for="is_public">Make Quiz Public:</label>
        <select name="is_public" id="is_public" required>
            <option value="1">Public</option>
            <option value="0" selected>Private</option>
        </select>

        <!-- Questions Section -->
        <h3>Questions:</h3>
        <div id="questions-container">
            <div class="question">
                <label>Question:</label>
                <input type="text" name="questions[0][question]" required>

                <label>Answer:</label>
                <input type="text" name="questions[0][answer]" required>

                <button type="button" class="remove-question" onclick="removeQuestion(this)">Remove</button>
            </div>
        </div>
        <button type="button" id="add-question">Add Question</button>

        <!-- Submit Button -->
        <button type="submit">Create Quiz</button>
    </form>
</main>

<script>
    let questionIndex = 1;

    document.getElementById('add-question').addEventListener('click', () => {
        const container = document.getElementById('questions-container');
        const newQuestion = `
            <div class="question">
                <label>Question:</label>
                <input type="text" name="questions[${questionIndex}][question]" required>

                <label>Answer:</label>
                <input type="text" name="questions[${questionIndex}][answer]" required>

                <button type="button" class="remove-question" onclick="removeQuestion(this)">Remove</button>
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