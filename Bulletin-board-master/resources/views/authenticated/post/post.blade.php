@extends('layouts.login')
@section('content')
<!-- ログイン認証の情報をformタグで受け取る -->
<form action="{{ route('post') }}" method="GET">
     @csrf
  <header>
    <h1>新規投稿画面</h1>
    <!-- ログアウトボタン　 -->
       <p class="logout-btn"><a href="/logout"><i class="fas fa-external-link-alt"></i>ログアウト</a></p>
  </header>

  <div class = "category-container">

  <!-- サブカテゴリー -->

  <!-- タイトル -->
  <!-- 投稿内容 -->
  <!-- 送信ボタン -->
  </div>

</form>
@endsection
