@extends('layouts.my')

@section('title','お気に入り一覧')

@section('content')
<div class="container">
    <h3 class="title">お気に入り一覧</h3>
    @if( $favorites->count() > 0 )

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>番号</th>
                    <th></th>
                    <th>タイトル</th>
                    <th>本文</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($favorites as $favorite )
                <tr>
                    <td>{{DB::table('articles')->where('id', $favorite->article_id)->first()->id}}</td>
                    <td><img src="/storage/image{{DB::table('articles')->where('id', $favorite->article_id)->first()->photo}}" alt= "sample"></td>
                    <td>{{DB::table('articles')->where('id', $favorite->article_id)->first()->title}}</td>
                    <td>{{DB::table('articles')->where('id', $favorite->article_id)->first()->body}}</td>
                    <td></td>
                </tr>
            </tbody>
        @endforeach
        </table>
    @else
        <h3>お気に入りは登録されていません</h3>
    @endif
</div>
@endsection

