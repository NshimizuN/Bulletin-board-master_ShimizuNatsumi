@extends('layouts.login')
@section('content')
<!-- ログイン認証の情報をformタグで受け取る -->
<form action="{{ route('loginTop') }}" method="POST">
     @csrf
  <header>
    <h1>{{ Auth::user()->username }}さん</h1>
    <h1>投稿一覧画面</h1>
    <!-- ログアウトボタンをフォームタグで囲みログアウトルーティングを通す -->
    <form action="{{ route('logout') }}" method="get">
        @csrf
        <input class="logout-btn" type="submit" value="ログアウト">
    </form>
  </header>

  <div class ="top-container">
      <!-- 左側 -->
      <div class="top-left-box">
          <div class="post-container">
              <div class="post-box">
                    <span>〜〜さん</span>
                    <span>〜〜年〜〜月〜〜日</span>
                    <span>〜〜View</span>
                    <span>投稿</span>
                    <span>サブカテゴリー</span>
                    <span>コメント数</span>
                    <span>いいね</span>
              </div>
         </div>
      </div>

      <!-- 右側 -->
      <div class="top-right-box">
          <p><a href="{{ route('category') }}">カテゴリーを追加</a></p>
          <p><a href="{{ route('post') }}">投稿</a></p>
          <span>検索</span>
          <span>いいねした投稿</span>
          <span>自分の投稿</span>
          <span>カテゴリー一覧</span>
      </div>
  </div>

</form>
@endsection
