<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../resources/css/app.css">
    <title>Document</title>
    @yield('head')
</head>
<body>
<header>
    <nav>
        <div class="left-side">
            <div class="like-logo">
                <a href="{{route('/')}}">Пропуски</a>
            </div>
        </div>
        <div class="right-side">
            @guest()
                <div>
                    <a href="{{route('addPass')}}">Создание пропуска</a>
                </div>
                <div>
                    <a href="{{route('authStaff')}}">Вход для работников</a>
                </div>
            @endguest
            @auth()
                    @if(Auth::user()->role_id == 1)
                        <div>
                            <a href="{{route('adminLk')}}">Личный кабинет</a>
                        </div>
                    @endif
                    @if(Auth::user()->role_id == 2)
                            <div>
                                <a href="{{route('operatorLk')}}">Личный кабинет</a>
                            </div>
                        @endif
                    <div>
                        <a href="{{route('logout')}}">Выход</a>
                    </div>
            @endauth
        </div>
    </nav>
</header>
<section class="content-section">
    <div class="content-wrap">
        @yield('content')
    </div>
</section>
</body>
</html>
