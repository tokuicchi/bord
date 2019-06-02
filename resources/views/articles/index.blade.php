@extends('layouts.my')

@inject('fav', 'App\Http\Controllers\FavoritesController')

@section('title','記事一覧')

@section('content')
    <div class="container">
        @foreach($articles as $article)
            <img src="/storage/image{{$article->photo}}" alt= "sample">
            <h4>{{$article->title}}</h4>
            <p>{{$article->body}}</p>
            <ul>
                <li style="list-style:none; float:left;"><a href="/articles/{{$article->id}}">詳細 | </a></li>
                <li style="list-style:none; float:left;"><a href="/articles/{{$article->id}}/edit"> 編集 </a></li><br>
            </ul>

        {{--  お気に入りボタン  --}}
            <div>
            @if ( DB::table('favorites')->where([['article_id', $article->id],['user_id', $user->id]])->count() > 0)
                {{--  <form action="/favorites/{{$article->id}}" method="delete" enctype="multipart/form-data" >  --}}
                <form action="/favorites/{{$article->id}}" method="delete" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <input type="hidden" name="article_id" value="{{$article->id}}">
                    <input type="button" value="お気に入り解除" onclick="{{$fav->destroy()}}">
                </form>
            @else
                <form action="/favorites" method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <input type="hidden" name="article_id" value="{{$article->id}}">
                    <input type="submit" value="お気に入り登録">
                </form>
            @endif
            </div>

            <hr>
        @endforeach
    </div>
@endsection

