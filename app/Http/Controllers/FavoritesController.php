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

        Log::debug($favorite);
        Log::info($favorite);
        // var_dump($favorite);
        // logger($favorite);
        // info($favorite);
        // return redirect('/favorites');
    }

    // お気に入り一覧
    public function index()
    {
        // $user = Auth::user();
        // $favorites= Favorite::where('user_id', $user->id);
        $favorites= Favorite::all();
        return view('favorites.index',['favorites' => $favorites]);
    }

    public function show()
    {
        $favorites= Favorite::all();
        return view('favorites.index',['favorites' => $favorites]);
    }
}
