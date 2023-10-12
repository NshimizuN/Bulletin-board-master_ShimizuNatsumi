@extends('layouts.logout')
@section('content')

<!-- ページURLの指定、ルーティングの指定 -->
<!-- 'route' => 'registerPost'はルーティングのname指定 -->
{!! Form::open(['url' => '/welcome', 'route' => 'welcome']) !!}
<div class="welcome-container">
  <span class="thanks"><b>登録ありがとうございます！</b></span>

         <div class="welcome-btn-form">
            <p><b><a class="welcome-btn" href="{{ route('login') }}">ログインはこちら</a></b></p>
         </div>

</div>
{!! Form::close() !!}

@endsection
