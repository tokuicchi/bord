<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SimpleBoard') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/articles') }}">
                            SimpleBoard
                        </a>
                    </div>

                    <!-- Navbar Left -->
                    <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                    </div>
                    <!-- Navbar Right -->
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        @guest
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">ログイン</a></li>
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">ユーザ登録</a></li>
                            </ul>
                        @else
                            <ul class="nav navbar-nav navbar-right">
                                <li class="nav-item"><a href="/articles/create" class="nav-link">新規投稿</a></li>
                                <li class="nav-item"><a href="/articles" class="nav-link">最新の投稿</a></li>
                                <li class="nav-item"><a href="/popularity" class="nav-link">人気の投稿</a></li>
                                <li class="nav-item"><a href="/favorites" class="nav-link">お気に入り一覧</a></li>
                                {{--  <div class="dropdown">
                                <button type="button" id="dropdown1"
                                    class="btn btn-secondary dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    投稿一覧
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdown1">
                                    <a class="dropdown-item" href="/articles">最新の投稿</a>
                                    <a class="dropdown-item" href="#">人気の投稿</a>
                                    <a class="dropdown-item" href="/favorites" >お気に入り一覧</a>
                                </div>
                                </div>  --}}                        
                            <ul>
                        @endguest
                    </div>
                </div>
            </nav>
        </header>
        <body>
            <div class="wrapper">
                @yield('content')
                <footer id="sticky-footer" class="py-4 bg-dark text-white-50 fixed-bottom">
                    <div class="container text-center">
                        <small>Copyright &copy; Yusuke Tokui</small>
                    </div>
                </footer>
            </div>
        </body>   
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

    