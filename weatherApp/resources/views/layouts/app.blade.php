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
        <a class="navbar-brand" href="{{ route('home') }}">Weather Data</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                @foreach ($navItems ?? [] as $item)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route($item['route']) }}">{{ $item['label'] }}</a>
                    </li>
                @endforeach

                @auth {{-- only visible when logged in (WORKS!) --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('weather.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('weather.index') }}">Latest Data</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('subscriptions.index') }}">Subscriptions</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger" >Logout</button>
                    </form>
                </li>
                @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('show.login') }}">Login</a>
                </li>
                @endguest
            </ul>
{{--            <ul>  dit is een poging om nav items uit een array te kunnen injecten --}}
{{--                @foreach ($navItems ?? [] as $item)--}}
{{--                    <li><a href="{{ route($item['route']) }}">{{ $item['label'] }}</a></li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}

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
