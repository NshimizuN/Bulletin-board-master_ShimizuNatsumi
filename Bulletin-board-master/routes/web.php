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

//あらかじめあった記述
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/hello', function(){
//     echo 'Hello World !';
// });
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');//Laravelの最初




// ログイン前の画面
Route::group(['middleware' => ['guest']], function(){
    //Auth\Loginにまとまってるコントローラー
  Route::namespace('Auth\Login')->group(function(){
      //ログイン画面を表示
      Route::get('/login', 'LoginController@login')->name('login');
      // 新規登録画面を表示
      Route::get('/register', 'LoginController@register')->name('register');
    //   ログイン→トップ画面へ推移
      Route::post('/login/top', 'LoginController@loginTop')->name('loginTop');
    });

    //Auth\Loginにまとまってるコントローラー
  Route::namespace('Auth\Register')->group(function(){
        // 新規登録を完了、ログイン画面へ
      Route::post('/register', 'RegisterController@registerPost')->name('registerPost');
      //登録完了の画面へ推移
     Route::get('/welcome', 'RegisterController@welcome')->name('welcome');
     //登録完了の画面へ推移
     Route::get('/welcome', 'RegisterController@registerLogin')->name('registerLogin');
    });

});



//ログイン中ページ、auth認証ずみ、
Route::group(['middleware' => 'auth'], function () {
  Route::namespace('Authenticated')->group(function(){
    Route::namespace('Top')->group(function(){
        //トップページを表示
         Route::get('/top', 'TopController@top')->name('top');
         //ログアウト機能
        Route::get('/logout', 'TopController@logout')->name('logout');
    });
     Route::namespace('Category')->group(function(){
        //カテゴリーページを表示
         Route::get('/category', 'CategoryController@category')->name('category');
        //メインカテゴリーに単語を追加
         Route::post('/create/main_category', 'CategoryController@mainCategoryCreate')->name('main.category.create');
        //メインカテゴリーの単語を削除
         Route::post('/delete/main_category', 'CategoryController@mainCategoryDelete')->name('main.category.delete');
         //サブカテゴリーに単語を追加
         Route::post('/create/sub_category', 'CategoryController@subCategoryCreate')->name('sub.category.create');
         //サブカテゴリーの単語を削除
         Route::post('/delete/sub_category', 'CategoryController@subCategoryDelete')->name('sub.category.delete');
         });
     Route::namespace('Post')->group(function(){
        //新規投稿ページを表示
         Route::get('/post', 'PostsController@post')->name('post');
         });

    });
    });
