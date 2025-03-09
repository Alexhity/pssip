<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'BrightLing')</title>

    <!-- Подключение через Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<!-- Ваша шапка -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo.png') }}" width="30" height="30" alt="Лого"> BrightLing
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.index') }}">Курсы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teachers.index') }}">Преподаватели</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">О школе</a>
                </li>

            </ul>

            <!-- Кнопки авторизации (правая часть) -->
            <ul class="navbar-nav ml-auto">
                @guest

                    <li class="nav-item">
                        <a class="btn btn-outline-primary" href="{{ route('login') }}">Войти</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item ml-2">
                            <a class="btn btn-success" href="{{ route('register') }}">Регистрация</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
{{--                            <li><a class="dropdown-item" href="{{ route('profile') }}">Профиль</a></li>--}}
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Выйти</button>
                                </form>
                            </li>

                        </ul>
                    </li>


                @endguest
            </ul>

        </div>

    </div>
</nav>

<!-- Основной контент -->
<main class="py-4">
    <div class="container">
        @yield('content')


    </div>
</main>

<!-- Скрипты Bootstrap -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
