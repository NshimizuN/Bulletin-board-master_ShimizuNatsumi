@extends('layouts.login')
@section('content')
<!-- ログイン認証の情報をformタグで受け取る -->
    <form action="{{ route('loginTop') }}" method="POST">
        @csrf
        <span>トップページ</span>
        <button type="submit">トップへ</button>
    </form>
<!-- ログアウトボタンをフォームタグで囲みログアウトルーティングを通す -->
<form action="{{ route('logout') }}" method="get">
  @csrf
  <input type="submit" value="ログアウト">
</form>
@endsection
