<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

// Route::patch('favorites/store', 'FavoritesController@create');
// Route::delete('favorites/destroy', 'FavoritesController@destroy');
// Route::get('favorites', 'FavoritesController@index');

Route::get('popularity','FavoritesController@popularity')->name('popularity');
Route::resource('favorites', 'FavoritesController');

// Route::resource('favorites', 'FavoritesController',['only'=>['index','store', 'destroy']]);

Route::resource('articles', 'ArticlesController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::post('/upload', 'HomeController@upload');

