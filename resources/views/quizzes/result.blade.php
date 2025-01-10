@extends('layout')

@section('content')
<header>
    <h1>Quiz Complete!</h1>
</header>

<main>
    <h2>Your Results</h2>
    <p>You scored {{ $score }} out of {{ $total }}.</p>

    <div class="buttons">
        <a href="{{ route('quizzes.index') }}" class="btn">Back to Quizzes</a>
    </div>
</main>
@endsection