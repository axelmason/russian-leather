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
        <main>
            @section('header')
            <header class="py-2 border-bottom bg-white position-fixed w-100" style="height: 75px; z-index: 6;">
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
            @show
            <div class="content" style="padding-top: 75px;">
                <div class="container-fluid bg-dark">
                        @if (session()->has('success'))
                        <div class="container pt-2">
                            <div class="alert alert-success">{{ session()->get('success') }}</div>
                        </div>
                        @endif
                    @yield('content')
                </div>
            </div>
            @section('footer')
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-2">
                                <a href="#" class="fs-5">Интернет-магазин</a>
                            </div>
                            <div class="col-2">
                                <h5>Основные разделы</h5>
                                <ul>
                                    <li><a href="#">Раздел1</a></li>
                                    <li><a href="#">Раздел2</a></li>
                                    <li><a href="#">Раздел3</a></li>
                                    <li><a href="#">Раздел4</a></li>
                                    <li><a href="#">Раздел5</a></li>
                                </ul>
                            </div>
                            <div class="col-2">
                                <h5>Мы в соц. сетях</h5>
                                <ul>
                                    <li>
                                        <a href="#">VK</a>
                                    </li>
                                    <li>
                                        <a href="#">Telegram</a>
                                    </li>
                                    <li>
                                        <a href="#">YouTube</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-2">
                                <h5>Связаться с нами</h5>
                                <ul>
                                    <li><a href="tel:+79000000000">+79000000000</a></li>
                                    <li><a href="email:email@email.com">email@email.com</a></li>
                                </ul>
                            </div>
                            <div class="col-2">
                                <h5>Оставить отзыв</h5>
                                @permission('reviews')
                                    <form action="{{ route('sendReview') }}" method="POST">
                                        @csrf
                                        <div>
                                            <label for="message" class="label-form">Сообщение</label>
                                            <input type="text" name="message" class="form-control">
                                            <button type="submit" class="btn btn-primary">Отправить</button>
                                        </div>
                                    </form>
                                @endpermission
                            </div>
                        </div>
                    </div>
                </footer>
            @show
        </main>
    </div>
</body>

</html>
