@extends('layouts.my')

@section('title','人気順')

@section('content')
<div class="container">
    <h3 class="title">人気順</h3>
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
                @foreach($popularities as $popularity )
                <tr>
                    <td>{{DB::table('articles')->where('id', $popularity->article_id)->first()->id}}</td>
                    <td><img src="/storage/image{{DB::table('articles')->where('id', $popularity->article_id)->first()->photo}}" alt= "sample"></td>
                    <td>{{DB::table('articles')->where('id', $popularity->article_id)->first()->title}}</td>
                    <td>{{DB::table('articles')->where('id', $popularity->article_id)->first()->body}}</td>
                    <td>
                        <a class="btn btn-primary" href="/articles/{{DB::table('articles')->where('id', $popularity->article_id)->first()->id}}">詳細 </a>
                        <a class="btn btn-primary" href="/articles/{{DB::table('articles')->where('id', $popularity->article_id)->first()->id}}/edit"> 編集 </a>
                    </td>
                </tr>
            </tbody>
    @endforeach
    </table>
     
</div>
@endsection

