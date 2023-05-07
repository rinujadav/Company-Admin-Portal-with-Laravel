<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Company Admin Portal</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <div class="container">
        <h1>Welcome to Company Admin Portal</h1>
        <p>Manage your company and employees with ease and efficiency.</p>
        @if (Route::has('login'))
            
                @auth
                    <a href="{{ url('/home') }}"
                        class="btn">Home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="btn">Get Started</a>
                @endauth
            
        @endif
    </div>
</body>
</html>

