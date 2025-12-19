<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>
<body>
<div class="auth-container">
    <div class="auth-box">
        <h2>Student Login</h2>

        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('student.login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <p>Don't have an account? <a href="{{ route('student.register') }}">Sign Up</a></p>
        <a class="btn btn-outline" href="{{ route('admin.login') }}">
    Admin Login
</a>
    </div>
</div>
</body>
</html>
