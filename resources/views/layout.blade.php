<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/svg" href="{{ asset('assets/images/favicon.png') }}">

    <meta name="theme-color" content="#4caf50">
    <meta name="apple-mobile-web-app-status-bar-style" content="#4caf50">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agroinfo @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('style')
</head>

<body>

    @php

        $menuItens = [
            'dashboard' => [
                'title' => 'Home',
                'icon' => 'home',
                'route' => route('dashboard'),
                'disabled' => false,
            ],
            'products' => [
                'title' => __('Produtos'),
                'icon' => 'work',
                'route' => route('products'),
                'disabled' => false,
            ],
            'buyers' => [
                'title' => __('Compradores'),
                'icon' => 'store',
                'route' => '#',
                'disabled' => true,
            ],
            'seles' => [
                'title' => __('Vendas'),
                'icon' => 'shopping_basket',
                'route' => '#',
                'disabled' => true,
            ],
        ];

        $menuItens[Route::getCurrentRoute()->getName()]['selected'] = true;

    @endphp

    <div id="app">
        <v-app>

            <nav-bar :logout-route="'{{ route('logout') }}'"
                    :menu-itens="'{{json_encode($menuItens)}}'">

            </nav-bar>

            <v-content class="main__wrapper">

                <side-nav :menu-itens="' {{ json_encode($menuItens) }}' "></side-nav>

                    <div class="content__wrapper">
                        @yield('content')
                    </div>

            </v-content>
        </v-app>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>
</html>