<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agroinfo @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('storage/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('storage/css/app.css') }}">
    @yield('style')
</head>

<body>
    @if (Route::currentRouteName() !== 'home')
        <header>
            <nav>
                <div class="nav-wrapper">
                    <a href="{{ route(Auth::check() ? 'dashbord' : 'home') }}" class="brand-logo">Agroinfo</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        @if (Auth::check())
                            <li><a href="#">Sass</a></li>
                            <li><a href="#">Components</a></li>
                            <li><a href="#">JavaScript</a></li>
                        @endif
                    </ul>
                </div>
            </nav>
        </header>
    @endif

    <main>
        @yield('content')
    </main>

    <script src="{{ asset('storage/js/materialize.min.js') }}"></script>
    <script src="{{ asset('storage/js/axios.min.js') }}"></script>
    <script src="{{ asset('storage/js/app.js') }}"></script>
    @yield('script')
</body>
</html>