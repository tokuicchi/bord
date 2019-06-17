@extends('layouts.my')

@inject('fav', 'App\Http\Controllers\FavoritesController')

@section('title','記事一覧')

@section('content')
    <div class="container">
        <h3 class="title">最新の投稿</h3>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>番号</th>
                    <th></th>
                    <th>タイトル</th>
                    <th>本文</th>
                    <th></th>
                    <th></th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($articles as $key => $article )
                <tr>
                    <td>{{$article->id}}</td>
                    <td class="thumbnail"><img src="/storage/image{{$article->photo}}" alt= "sample"></td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->body}}</td>
                    <td>
                        <a class="btn btn-primary" href="/articles/{{$article->id}}">詳細 </a>
                        <a class="btn btn-primary" href="/articles/{{$article->id}}/edit"> 編集 </a>
                    </td>
                    <td>
                        {{--  お気に入りボタン  --}}
                        <div>
                        @if ( DB::table('favorites')->where([['article_id', $article->id],['user_id', $user->id]])->count() > 0)
                            <form action="{{ action('FavoritesController@destroy', $article->id) }}"   method="post" id="form_{{ $article->id }}" >
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <a href="#" data-id="{{ $article->id }}" class="btn btn-danger" onclick="deletePost(this);">お気に入り解除</a>
                            </form>

                            <script>
                            function deletePost(e) {
                            'use strict';
                            if (confirm('本当に削除していいですか?')) {
                            document.getElementById('form_' + e.dataset.id).submit();
                            }
                            }
                            </script>

                        @else
                            <form action="/favorites/" method="post" enctype="multipart/form-data" >
                                {{ csrf_field() }}
                                <input type="hidden" name="article_id" value="{{$article->id}}">
                                <input class="btn btn-primary" name="create" type="submit" value="お気に入り登録">
                            </form>
                        @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection