<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
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
    public function loginTop(Request $request)
    {
         $userdata = $request -> only('email', 'password');
        if (Auth::attempt($userdata)) {
            return redirect('/top');
        }else{
            return view("auth.login");
        }
    }

}
