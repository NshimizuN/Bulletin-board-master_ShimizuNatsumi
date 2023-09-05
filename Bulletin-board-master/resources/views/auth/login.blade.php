@extends('layouts.logout')

@section('content')


{!! Form::open(['url' => '/login' ]) !!}

<div class="login-container">
    <h1>ログイン</h1>
    <div>
        <div class="login-box">

        <!-- メールアドレス -->
            <div class="login-mail-box">
             <b>{{Form::label('email','メールアドレス',['class' =>'login-mail-lavel'])}}</b>
              <div class="border-bottom border-primary w-100">
                 {{Form::email('email', null, ['class' => 'login-mail-form'])}}
             </div>
          </div>

          <!-- パスワード -->
          <div class="login-pass-box">
               <b>{{Form::label('password','パスワード',['class' =>'login-password-lavel'])}}</b>
               <div class="border-bottom border-primary w-100">
                    {{Form::password('password', ['class' => 'login-password-form'])}}
              </div>
         </div>

         <!-- ログインボタン -->
         <div class="login-btn-form" >
             <p><b><a href="{{ route('top') }}">ログイン</a></b></p>
         </div>
    </div>

    <!-- 新規登録 -->
    <div class="login-to-register">
        <p><b>新規ユーザー登録は<a href="{{ route('register') }}">こちら</a>から</b></p>
    </div>

</div>

{!! Form::close() !!}

@endsection
