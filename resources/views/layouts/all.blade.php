<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @hasSection('title_force')
        <title>@yield('title_force')</title>
        <meta name="description" content="@yield('description_force')">
    @endif

    @sectionMissing('title_force')
        @header_seo
    @endif

    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon256.png')}}" sizes="256x256">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon128.png')}}" sizes="128x128">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon64.png')}}" sizes="64x64">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('/img/favicons/icon16.png')}}" sizes="16x16">
    <link rel="icon" type="image/svg" href="{{asset('/img/logo.svg')}}" sizes="any">

    <meta name="_token" content="{{ csrf_token() }}">

    <script>
        window.Auth = {!! json_encode([
            'signedIn' => Auth::check(),
            'user' => Auth::user()
        ]) !!};
    </script>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js',
        'public/scss/main.scss'
    ])
</head>
<body>
    <header class="main_header">
        <div class="container_main is-full">
            <nav class="top_navigation navbar">
                <div class="navbar-brand">
                    <a href="{{ route('home') }}" class="system_logo">
                        <img src="{{ asset('img/logo.svg') }}" alt="">
                        <span>Шахматка</span>
                    </a>
                    <a role="button" class="navbar-burger is-primary" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                      </a>
                </div>

                <div id="navbarBasicExample" class="navbar-menu">
                    <div class="navbar-start">
                        <a href="{{ route('home') }}" class="navbar-item">
                            Квартиры
                        </a>

                        @can('read_log')
                            <a href="{{ route('log') }}" class="navbar-item">
                                Лог
                            </a>
                        @endcan



                        <a  href="{{ route('stat') }}" class="navbar-item">
                            Cтатистика
                        </a>
                    </div>

                    <div class="buttons navbar-end">
                        <div class="user_icon_menu">
                            <div class="user_data">
                                <span>{{ auth()->user()->name }}</span>
                                <div class="icon">
                                    <img src="{{ asset('img/free_person.svg') }}" alt="{{ auth()->user()->name }}">
                                </div>
                            </div>


                            <div class="menu">
                                <ul>
                                    <li><a href="{{ route('cabinet') }}">Кабинет</a></li>
                                    <li><a href="{{ route('logout') }}">Выйти</a></li>
                                </ul>
                            </div>
                        </div>
                </div>

                </div>
            </nav>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {

            // Get all "navbar-burger" elements
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

            // Add a click event on each of them
            $navbarBurgers.forEach( el => {
            el.addEventListener('click', () => {

                // Get the target from the "data-target" attribute
                const target = el.dataset.target;
                const $target = document.getElementById(target);

                // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
            });

            });
        </script>
    </header>
    <main id="global_app">
        @yield('main')
    </main>
</body>
</html>
