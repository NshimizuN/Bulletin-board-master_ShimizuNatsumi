@extends('layouts.logout')

@section('content')

<!-- 渡したいログイン情報をFormで囲う、トップページのURLを指定 -->
{!! Form::open(['url' => '/login/top']) !!}


<div class="login-container">
    <h1>ログイン</h1>
    <div>
        <div class="login-box">

        <!-- メールアドレス -->
            <div class="login-mail-box">
             <b>{{Form::label('email','メールアドレス',['class' =>'login-mail-lavel'])}}</b>
              <!-- バリデーションメッセージ -->
              <div class="error_message">
                 @error('email')
                  <span>{{ $message }}</span>
                  @enderror
              </div>
              <div class="border-bottom border-primary w-100">
                 {{Form::email('email', null, ['class' => 'login-mail-form'])}}
             </div>
          </div>

          <!-- パスワード -->
          <div class="login-pass-box">
               <b>{{Form::label('password','パスワード',['class' =>'login-password-lavel'])}}</b>
              <div class="error_message">
                  @error('password')
                  <span>{{ $message }}</span>
                  @enderror
              </div>
               <div class="border-bottom border-primary w-100">
                    {{Form::password('password', ['class' => 'login-password-form'])}}
              </div>
         </div>

         <!-- ログインボタン -->
         <div class="login-btn-form" >
             <!-- ログイン認証するための情報を送る -->
            <p><b> {{Form::submit('ログイン',['class' => 'login-btn']) }}</b></p>
         </div>
    </div>

    <!-- 新規登録 -->
    <div class="login-to-register">
        <p><b>新規ユーザー登録は<a href="{{ route('register') }}">こちら</a>から</b></p>
    </div>

</div>

{!! Form::close() !!}

@endsection
