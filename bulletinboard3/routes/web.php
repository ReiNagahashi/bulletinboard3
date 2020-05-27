<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

Route::group(['middleware'=>'auth'],function(){
// PostController
Route::resource('posts','PostController');

Route::post('/ownFavorite/{post}',[
    'uses' => 'PostController@ownFavorite',
    'as' => 'posts.ownFavorite'
    ]);

Route::post('/deleteFavorite/{post}',[
    'uses' => 'PostController@deleteFavorite',
    'as' => 'posts.deleteFavorite'
    ]);

});

Route::get('/', 'HomeController@index')->name('home');
