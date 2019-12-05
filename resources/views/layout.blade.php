<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agroinfo @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    @yield('style')
</head>

<body>
    @if (Route::currentRouteName() !== 'home')
        <header>
            <nav class="nav-extended">
                <div class="nav-wrapper">
                    <a href="{{ route(Auth::check() ? 'dashboard' : 'home') }}" class="brand-logo left">Agroinfo</a>
                </div>
            </nav>
        </header>
    @endif

    <main id="app">
        @yield('content')
    </main>

    <script src="{{ asset('assets/js/materialize.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('script')
</body>
</html>