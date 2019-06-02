<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/stylesheet.css">
</head>
<body>
    <header>
        <h3>簡易掲示板</h3>
        <ul>
            <li><a href="/articles">投稿一覧</li>
            <li><a href="/articles/create">新規投稿</a></li>
            <li><a href="/favorites/index">お気に入り一覧</li>
            <li><a href="#">ユーザー設定</a></li>
        <ul>
    </header>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>

    