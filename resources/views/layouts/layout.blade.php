<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logos/cinema.svg') }}">
    <title>@yield('title')</title>
</head>
<body>

<header>
    <nav class="flex center">
        <img src="{{ asset('assets/images/logos/cinema.svg') }}" alt="Логотип" width="75"/>
        <ul>
            <li><a class="nav-page btn btn-nav" href="{{ route('users.index') }}">Пользователи</a></li>
            <li><a class="nav-page btn btn-nav" href="{{ route('media.index') }}">Медиа-каталог</a></li>
            <li><a class="nav-page btn btn-nav" href="{{ route('studios.index') }}">Студии</a></li>
            <li><a class="nav-page btn btn-nav" href="{{ route('directors.index') }}">Режиссёры</a></li>
            <li><a class="nav-page btn btn-nav" href="{{ route('actors.index') }}">Актёры</a></li>
            <li><a class="nav-page btn btn-nav" href="{{ route('genres.index') }}">Жанры</a></li>
        </ul>
    </nav>
</header>

<main class="content-center">
    @yield('content')
</main>

<footer>

</footer>

</body>
</html>
