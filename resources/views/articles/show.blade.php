@extends('layouts.my')

@section('title','記事詳細')

@section('content')
<div class="container">
    <img src="/storage/image/{{$article->photo}}" >
    <h1>{{$article->title}}</h1>
    <p>{{$article->body}}</p>
    <br>
    <a href="/articles/{{$article->id}}/edit">編集</a>

    {{--  <form action="/favorites/{{$article->id}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="like">
        <input type="submit" name="" value="お気に入り">
    </form>  --}}
    <a href="/articles">一覧に戻る</a>
</div>
@endsection

