<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')世界旅行記</title>
    <link rel="shortcut icon" href="{{ asset('/favicon13.ico') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body id="app_body" class="bg-dark">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark bg-gradient shadow-sm" style="z-index: 10;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                <span class="home_title fw-bold fs-3 text-white">世界旅行記</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span><i class="fa-solid fa-bars-staggered fs-1 text-light"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @auth
                    <ul class="navbar-nav me-auto my-2">
                        <li class="nav-item">
                            <div class="m-auto">
                                <form method="GET" action="{{ route('search') }}" onSubmit="return checkSearch()">
                                    @csrf
                                    <div class="search_form" style="display: flex;">
                                        <div class="form-group">
                                            <input id="text" name="search" class="form-control" size="40"  type="text" placeholder="What are you looking for?">
                                        </div>
                                        <div class="form-group mx-2">  
                                            <button class="btn btn-danger" type="submit">
                                                <i class="fa-solid fa-magnifying-glass text-light"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endauth

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest

                        <li class="nav-item">
                            <a class="nav-link text-white fw-bold  fs-5" href="{{ url('/') }}"><i class="fas fa-home"></i></a>
                        </li>
                            @if (Route::has('login'))
                            <li class="nav-item">
                                    <a class="nav-link text-white fw-bold fs-5" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                    <a class="nav-link text-white fw-bold fs-5" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                </li>
                            @endif
                        @else
                        @auth
                            <a href="/create" class="btn btn-outline-light fw-bold">新規投稿</a>
                        @endauth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('home') }}">
                                    {{ __('一覧画面へ') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" style="height: 100%;">
            @yield('content')
        </main>
    </div>

<script>
    function checkSearch(){
        if(confirm('その検索ワードで検索しますか？')){
            return true;
        } else {
            return false;
            }
        }
</script>
</body>
</html>
