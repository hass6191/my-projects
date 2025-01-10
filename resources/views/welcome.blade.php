<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Quiz Mania</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 0;
            margin: 0;
        }
        header {
            padding: 50px 20px;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }
        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
        .buttons {
            margin-top: 30px;
        }
        .buttons a, .buttons button {
            text-decoration: none;
            padding: 15px 30px;
            margin: 10px;
            display: inline-block;
            background-color: #fff;
            color: #2575fc;
            border-radius: 30px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s, color 0.3s;
        }
        .buttons a:hover, .buttons button:hover {
            background-color: #2575fc;
            color: #fff;
        }
        footer {
            margin-top: 50px;
            font-size: 0.9rem;
            color: #ddd;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Quiz Mania</h1>
        <p>Test your knowledge, challenge your friends, and create your own quizzes!</p>
        <div class="buttons">
            @auth
                <!-- Links for authenticated users -->
                <a href="{{ route('quizzes.index') }}">View Quizzes</a>
                <a href="{{ route('quizzes.create') }}">Create a Quiz</a>
                <a href="{{ route('quizzes.favorites') }}">View Favorites</a>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <!-- Links for guest users -->
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </header>

    <!-- Vue.js Mount Point -->
    <div id="app">
        <example-component></example-component>
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Quiz Mania. All rights reserved.</p>
    </footer>

    <!-- Include the compiled JavaScript -->
    @if (file_exists(public_path('js/app.js')))
        <script src="{{ asset('js/app.js') }}" defer></script>
    @else
        <script>
            console.warn("Compiled JavaScript file (app.js) not found. Run 'npm run dev' to generate it.");
        </script>
    @endif
</body>
</html>