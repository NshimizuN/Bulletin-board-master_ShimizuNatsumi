@extends('layouts.login')
@section('content')
<!-- ログイン認証の情報をformタグで受け取る -->
<form action="{{ route('post') }}" method="GET">
     @csrf
  <header>
    <h1>新規投稿画面</h1>
    <!-- ログアウトボタン -->
    <form action="{{ route('logout') }}" method="get">
        @csrf
        <input class="logout-btn" type="submit" value="ログアウト">
    </form>
  </header>

</form>
@endsection
