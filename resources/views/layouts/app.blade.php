<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="video-wrapper" style="z-index: 0;">
            <video autoplay muted loop id="video">
                <source src="{{ asset('video.mp4') }}" type="video/mp4">
            </video>
        </div>
        <main>
            <header class="py-2 border-bottom bg-white position-fixed w-100">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-1">
                            <div class="logo-wrapper">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <search-form></search-form>
                        </div>
                        <div class="col-lg-4">
                            <menu-dropdown></menu-dropdown>
                        </div>
                        <div class="col-lg-1 language__selectors">
                            <a href="#" class="@if(App::isLocale('en')) text-decoration-underline text-dark @else text-secondary @endif">EN</a>
                            <div class="vr"></div>
                            <a href="#" class="@if(App::isLocale('ru')) text-decoration-underline text-dark @else text-secondary @endif">RU</a>
                        </div>
                        <div class="col-lg-3 d-flex">
                            @guest
                                <register-modal></register-modal>
                                <login-modal></login-modal>
                            @else
                                <a href="{{ route('logout') }}" class="btn btn-outline-dark">Выйти</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </header>
            <div class="content" style="padding-top: 6em">
                @yield('content')
            </div>
            {{-- <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <a href="#">Интернет-магазин</a>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </footer> --}}
        </main>
    </div>
</body>

</html>
