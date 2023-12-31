<?php

// namespace App\Http\Controllers\Top;
namespace App\Http\Controllers\Authenticated\Top;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class TopController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }

    //ログインしてトップ画面へ推移
        public function top()
    {
        return view('authenticated.top.top');
    }

    // ログアウト機能
    public function logout()
    {
        // dd("123");
        Auth::logout();
        // ログインページへ戻る
        return redirect('/login');
    }

}
