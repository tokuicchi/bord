<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Favorite;
use Auth;
use Illuminate\Support\Facades\Log;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        $user = Auth::user();
        $favorites = Favorite::all();
        // $favorite = $articles->find(1)->favorites()->where('user_id', $user->id)->get();
        return view('articles.index',['articles'=>$articles,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::all();
        $user = Auth::user();
        return view('articles.create',['articles'=>$articles,'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate_rule = [
            'title' => 'required',
            'body' => 'required',
            'photo' => 'required'
        ];
        $this->validate($request, $validate_rule);

        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $photoName = $request->photo->store('public/image');
        $article->photo = str_replace('public/image', '',$photoName);
        $article->save();
        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show',['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $user = Auth::user();
        return view('articles.edit',['article'=>$article,'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->body = $request->body;
        // $photoName = $request->photo->store('public/image');
        // $article->photo = str_replace('public/image', '',$photoName);
        $article->save();
        return redirect('/articles/'.$id);
    }

    // プロフィール画像投稿
    public function upload(Request $request, $id)
    {
        $this->validate($request, [
            'file' => [
                'required',
                'file',
                'image',
                'mimes:jpeg,png',
                'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $filename = $request->file->store('public/articles');
            $articles = Article::find(auth()->id());
            $articles->photo = basename($filename);
            $articles->save();

            return redirect('/articles/'.$id)->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles');
    }


    
}
