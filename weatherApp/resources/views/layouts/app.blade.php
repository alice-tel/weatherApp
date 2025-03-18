<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Data App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('weather.dashboard') }}">Weather Data</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('weather.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('weather.index') }}">Latest Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.register') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
