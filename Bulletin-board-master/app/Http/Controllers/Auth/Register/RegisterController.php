<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
//リクエストフォームの使用を可能にする
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\UserRequest;

use App\Models\Users\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    //新規登録する
    protected function registerPost(UserRequest $request)
    {
          DB::beginTransaction();
        //   新規登録を作成
          $user_get = User::create([
              'username' => $request->username,
              'email' => $request->email,
              'password' => bcrypt($request->password),
              'password_confirmation' => $request->password_confirmation,
            ]);
            // 一致するidが見つからない場合エラーを返す
            $user = User::findOrFail($user_get->id);
            DB::commit();
            // 登録完了の画面へ推移
            return view('auth.welcome');
    }



}
