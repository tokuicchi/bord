@extends('layouts.my')

@section('title','お気に入り一覧')

@section('content')
<div class="container">
    <h3>お気に入り一覧</h3>
    @if( $favorites->count() > 0 )
        @foreach($favorites as $favorite )
            <h4>{{$favorite->article_id}}</h4>
            <h4>{{$favorite->user_id}}</h4>
            <hr>
        @endforeach
    @else
        <h3>お気に入りはありません</h3>
    @endif
</div>
@endsection

