@extends('layout')

@section('content')
    <header>
        <h1>Your Favorite Quizzes</h1>
    </header>

    <main>
        @if ($favorites->isEmpty())
            <p>You haven't added any quizzes to your favorites yet.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($favorites as $favorite)
                        <tr>
                            <td>{{ $favorite->quiz->title }}</td>
                            <td>{{ $favorite->quiz->category }}</td>
                            <td>
                                <a href="{{ route('quizzes.play', $favorite->quiz->id) }}" class="btn">Play</a>
                                <form action="{{ route('quizzes.unfavorite', $favorite->quiz->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn">Remove from Favorites</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </main>
@endsection