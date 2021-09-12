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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');
//Auth::routes();

// 定義  Route::HTTP上の通信方法('  どのURLで表示する？  ', 'コントローラーのどのメソッドor関数？');

//◆◆◆ログアウト中のページ◆◆◆
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');

// ログアウト
Route::get('/logout','Auth\LoginController@logout');

// 新規登録????
Route::get('auth/register','Auth\RegisterController@showRegistrationForm');
Route::post('auth/register','Auth\RegisterController@register');


//◆◆◆ログイン中のページ◆◆◆
Route::get('/top','PostsController@index');

// (作成中)プロフィール
Route::get('/profile','UsersController@profile');

// (未完成)フォローリスト
Route::get('/followList','FollowsController@followList');
// (未完成)フォロワーリスト
Route::get('/followerList','FollowsController@followerList');
// (未完成)検索
Route::get('/search','UsersController@search');

// 投稿
Route::get('/create', 'PostsController@create');
Route::post('/create', 'PostsController@create');
// 投稿編集
Route::get('{id}/update', 'PostsController@update');
Route::post('/update', 'PostsController@update');
// 投稿削除
Route::get('{id}/delete', 'PostsController@delete');
Route::post('/delete', 'PostsController@delete');





