@extends('layouts.logout')
@section('content')

<!-- ページURLの指定、ルーティングの指定 -->
<!-- 'route' => 'registerPost'はルーティングのname指定 -->
{!! Form::open(['url' => '/register', 'route' => 'registerPost']) !!}

<div class="register-container">
    <h1>新規登録</h1>
    <div>
        <div class="register-box">
        <!-- ユーザー名 -->
            <div class="register-username-box">
             <b>{{Form::label('username', 'ユーザー名',['class' =>'register-username-lavel'])}}</b>
         <!-- バリデーションメッセージ -->
          <div class="error_message">
             @if($errors->first('username'))
             <span>{{ $errors->first('username') }}</span>
             @endif
          </div>
              <div class="border-bottom border-primary w-100">
                 {{Form::text('username', null, ['class' => 'register-username-form'])}}
             </div>
          </div>

          <!-- メールアドレス -->
          <div class="register-mail-box">
             <b>{{Form::label('email', 'メールアドレス',['class' =>'register-mail-lavel'])}}</b>
              <!-- バリデーションメッセージ -->
              <div class="error_message">
                  @if($errors->first('email'))
                  <span>{{ $errors->first('email') }}</span>
                  @endif
              </div>
             <div class="border-bottom border-primary w-100">
                 {{Form::email('email', null, ['class' => 'register-mail-form'])}}
             </div>
         </div>



         <!-- パスワード -->
         <div class="register-password-box">
             <b>{{Form::label('password', 'パスワード',['class' =>'register-password-lavel'])}}</b>
              <!-- バリデーションメッセージ -->
              <div class="error_message">
                  @if($errors->first('password'))
                  <span>{{ $errors->first('password') }}</span>
                  @endif
              </div>
              <div class="border-bottom border-primary w-100">
                  {{Form::password('password',['class' => 'register-password-form'])}}
             </div>
          </div>

          <!-- パスワード確認 -->
          <div class="register-confirmation-box">
             <b>{{Form::label('password_confirmation', 'パスワード確認', ['class' =>'register-confirmation-lavel'])}}</b>
               <div class="border-bottom border-primary w-100">
                 {{Form::password('password_confirmation', ['class' => 'register-confirmation-form'])}}
              </div>
         </div>

         <!-- 確認ボタン -->
         <div class="register-btn-form" >
               {{ Form::submit('確認',['class' => 'register-btn','onclick' => 'return confirm("登録してよろしいですか？")']) }}
         </div>
    </div>
</div>

{!! Form::close() !!}

@endsection
