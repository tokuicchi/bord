@extends('layouts.my')

@section('title','新規作成')

@section('content')
<div class="container">
    <form method="post" action="/articles" enctype="multipart/form-data" >
        {{csrf_field()}}
        <div>
            <label for="title">タイトル</label>
            <input type="text" name="title" placeholder="記事タイトルを入力">
        </div>
        <div>
            <label for="body">内容</label>
            <textarea name="body" rows="8" cols="80" placeholder="記事内容を入力"></textarea>
        </div>

        <div>
            <label for="title">画像</label>
            <input type="file" name="photo" >
        </div>

        {{--  画像投稿  --}}
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
            <input type="submit" value="送信">
        </div>
    </form>
        <a href="/articles">一覧に戻る</a>
</div>
@endsection

