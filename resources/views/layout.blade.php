<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                'route' => '#',
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

            <main class="main__wrapper">

                <side-nav :menu-itens="' {{ json_encode($menuItens) }}' "></side-nav>

                @yield('content')
            </main>
        </v-app>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
</body>
</html>