@extends('layouts.logout')
@section('content')

<!-- ページURLの指定、ルーティングの指定 -->
<!-- 'route' => 'registerPost'はルーティングのname指定 -->
{!! Form::open(['url' => '/welcome', 'route' => 'welcome']) !!}
<div class="welcome-container">
  <span>登録ありがとうございます！</span>

         <div class="welcome-btn-form" >
        <p><b><a href="{{ route('login') }}">ログインはこちら</a></b></p>
         </div>

</div>
{!! Form::close() !!}

@endsection
