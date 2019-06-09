@extends('layouts.my')

@section('title','人気順')

@section('content')
<div class="container">
    <h3 class="title">人気順</h3>
    @foreach($popularities as $popularity )
        <h4>{{$popularity->article_id}}</h4>
        <h4>{{$popularity->user_id}}</h4>
        <hr>
    @endforeach
     
</div>
@endsection

