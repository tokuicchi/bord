@extends('layouts.my')

@section('title','編集')

@section('content')
<div class="container">
    <form action="/articles/{{$article->id}}" method="post">
        {{csrf_field()}}

        <div>
            <label for="title">タイトル</label>
            <input type="text" name="title" placeholder="記事タイトルを入力" value="{{$article->title}}">
        </div>

        <div>
            <label for="body">内容</label>
            <textarea name="body" rows="8" cols="80" placeholder="記事内容を入力">{{$article->body}}</textarea>
        </div>

        <div>
            <label for="title">画像</label>
            <input type="file" name="photo" >
        </div>

        {{--成功時のメッセージ--}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        {{-- エラーメッセージ --}}
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif

        <div>
            <input type="hidden" name="_method" value="patch">
            <input type="submit" value="更新">
        </div>
    </form>

    {{--  削除  --}}
        <div>
            <form action="/articles/{{$article->id}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <input type="submit" name="" value="削除する">
            </form>
        </div>
    
    <a href="/articles">一覧に戻る</a>
</div>
@endsection

