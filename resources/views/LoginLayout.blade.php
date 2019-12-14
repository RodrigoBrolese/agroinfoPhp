<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="theme-color" content="#4aa54e">
    <meta name="apple-mobile-web-app-status-bar-style" content="#4aa54e">

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
                    @auth
                        <ul class="nav-itens right hide-on-med-and-down">
                            <li><a href="#"><i class="material-icons small left">person</i>Minha Conta</a></li>
                            <li><a href="{{ route('logout') }}">Sair</a></li>
                        </ul>
                        <a href="#" data-target="mobile-sidenav" class="sidenav-trigger right"><i class="material-icons medium">menu</i></a>
                    @endauth
                </div>
                @auth
                    <div class="nav-content">
                        <ul class="tabs tabs-transparent">
                            <li class="tab"><a href="#">Home</a></li>
                            <li class="tab"><a href="#">Vendas</a></li>
                            <li class="tab"><a href="#">Produtos</a></li>
                            <li class="tab"><a href="#">Compradores</a></li>
                    </ul>
                </div>

                    <ul class="sidenav" id="mobile-sidenav">
                        <li class="wrapper-close-nav">
                            <a href="#" class="">
                                <i class="material-icons black-text big sidenav-close right">close</i>
                            </a>
                        </li>
                        <li><a href="#"><i class="material-icons small left">person</i>Minha conta</a></li>
                        <li><a href="{{ route('logout') }}"><i class="material-icons"></i> Sair</a></li>
                    </ul>

                @endauth
            </nav>
        </header>
    @endif

    <main>
        @yield('content')
    </main>

    <script src="{{ asset('assets/js/materialize.min.js') }}"></script>
    <script src="{{ asset('assets/js/axios.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('script')
</body>
</html>