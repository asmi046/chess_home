<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @header_seo

    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon256.png')}}" sizes="256x256">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon128.png')}}" sizes="128x128">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon64.png')}}" sizes="64x64">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon16.png')}}" sizes="16x16">
    <link rel="icon" type="image/svg" href="{{asset('/img/logo.svg')}}" sizes="any">

    <meta name="_token" content="{{ csrf_token() }}">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'public/scss/main.scss'
    ])
</head>
<body>
    <header class="main_header">
        <div class="container">
            <div class="top_navigation">
                <div class="system_logo">
                    <img src="{{ asset('img/logo.svg') }}" alt="">
                    <span>Шахматка</span>
                </div>

                <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item">
                            Квартиры
                        </a>

                        <a class="navbar-item">
                            Лог
                        </a>

                        <a class="navbar-item">
                            Cтатистика
                        </a>
                    </div>
                </div>
                <div class="buttons">
                    <a href="{{route('logout')}}" class="button is-primary"> Выйти </a>
                </div>
        </div>
    </header>
    <main id="global_app">
        @yield('main')
    </main>
</body>
</html>
