<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Custom CSS -->
    <style>
        .hover-animate:hover {
            animation: rubberBand 1s;
        }
    </style>
</head>
<body>
    <header class="hover-animate">
        <h1>Quiz Mania</h1>

            @auth
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="hover-animate">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover-animate">Login</a>
                <a href="{{ route('register') }}" class="hover-animate">Register</a>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Quiz App</p>
    </footer>
</body>
</html>