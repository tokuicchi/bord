<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Favorite;
use App\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Log;

class FavoritesController extends Controller
{
    //お気に入り登録
    public function store(Request $request)
    {
        if(isset($_POST['create']))
        {
            $user = Auth::user();
            $favorite = new Favorite;
            $favorite->user_id = $user->id;
            $favorite->article_id = $request->article_id;
            // $favorites->article_title = $request->article_title;
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
            return redirect('/favorites');
        }
    }
    // お気に入り解除
    public function destroy($id)
    {
        // logger($_SERVER['REQUEST_METHOD']);
        // if(isset($_GET['remove']))
        // {
            logger('destroy');
            $user = Auth::user();
            $favorite = Favorite::where([['article_id', $id],['user_id', $user->id]]);
            $favorite->delete();
            return redirect('/favorites');
        // }else
        // {
            // echo phpinfo();
            // logger(array_keys($_GET));
            // logger('Cannot destroy');
        // }
    }

    // お気に入り一覧
    public function index()
    {    
        $user = Auth::user();   
        $favorites = Favorite::all();
        $favorites = $favorites->where('user_id', $user->id);
        Log::debug($favorites);
        return view('favorites.index',['favorites' => $favorites]);
    }

    public function show()
    {
        $favorites = Favorite::all();
        return view('favorites.index',['favorites' => $favorites]);
    }

    // 人気順に並べる
    public function popularity()
    {
        // $favorites = Favorite::all();
        $popularities = \DB::table('favorites')->groupBy('article_id')->orderBy(\DB::raw('count(article_id)'), 'DESC')->get();
        $popularities = Favorite::groupBy('article_id')->orderBy(\DB::raw('count(article_id)'), 'DESC')->get();
        logger($popularities);
        return view('favorites.popularity',['popularities' => $popularities]);
    }
}
