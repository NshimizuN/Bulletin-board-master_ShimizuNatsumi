<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
//リクエストフォームの使用を可能にする
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\LoginRequest;

use Illuminate\Http\Request;
use App\Models\Users\User;
use Illuminate\Support\Facades\DB;
use Auth;


class LoginController extends Controller
{
    //ログイン画面を表示させる
    public function login()
    {
        return view('auth.login');
    }

     //新規登録画面へ推移
        public function register()
    {
        return view('auth.register');
    }

    //ログインしてトップ画面へ推移
    public function loginTop(LoginRequest $request)
    {
        // postメソッドへ送る
        if ($request->isMethod('post')) {
           $userdata = $request -> only('email', 'password');
          if (Auth::attempt($userdata)) {
            // ログイン認証ができたら/topページへ推移
            return redirect('/top');
          }
        }
            // 認証できなかったらログイン画面に止まる
            return view("auth.login");
    }

}
