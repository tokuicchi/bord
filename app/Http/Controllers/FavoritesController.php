<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Favorite;
use App\User;
use Auth;
use Illuminate\Support\Facades\Log;

class FavoritesController extends Controller
{
    //お気に入り登録
    public function store(Request $request)
    {
        $user = Auth::user();
        $favorite = new Favorite;
        $favorite->user_id = $user->id;
        $favorite->article_id = $request->article_id;
        // $favorites->article_title = $request->article_title;
        // $favorites->article_photo = $request->article_photo;
        // if ($favorites->article_id > 0) {
        //     $favorites->save();
        //     return redirect('/favorites/index')->with('success', 'お気に入り登録しました');
        // } else {
        //     return redirect()
        //         ->back()
        //         ->withInput()
        //         ->withErrors(['article_id' => 'お気に入り登録されています']);
        // }
        $favorite->save();
        $favorite = $user->favorites();
        // return view('favorites.index', ['favorite' => $favorite]);
        return redirect('/favorites');

    }
    // お気に入り解除
    public function destroy()
    {
        $user = Auth::user();
        $favorite = Favorite::where('user_id',$user->id);
        $favorite->delete();
        return redirect('/favorites');
        // var_dump($favorite); 
    }

    // お気に入り一覧
    public function index()
    {       
        $favorites = Favorite::all();
        $articles = Article::where('id',$favorites->article_id);
        return view('favorites.index',['favorites' => $favorites],['articles' => $articles]);
    }

    public function show()
    {
        $favorites = Favorite::all();
        return view('favorites.index',['favorites' => $favorites]);
    }

    // 人気順に並べる
    public function popularity(){
        $favorites = Favorite::all();
        $popularities = $favorites->sortByDesc('article_id');
        return view('favorites.popularity',['popularities' => $popularities]);
    }
}
