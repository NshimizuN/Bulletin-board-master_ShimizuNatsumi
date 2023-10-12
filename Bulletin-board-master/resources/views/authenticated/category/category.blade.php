@extends('layouts.login')
@section('content')
<!-- ログイン認証の情報をformタグで受け取る -->
<form action="{{ route('category') }}" method="POST">
     @csrf
  <header>
    <h1>カテゴリー追加画面</h1>
    <!-- ログアウトボタン -->
    <form action="{{ route('logout') }}" method="get">
        @csrf
        <input class="logout-btn" type="submit" value="ログアウト">
    </form>
  </header>

   <div class ="category-container">
      <!-- 左側 -->
      <div class="category-left-box">
          <div class="category-create-box">
            <!-- メインカテゴリーの追加 -->
            <span>新規メインカテゴリー</span>
            <input type="text" class="main_category_form" name="main_category" form="mainCategoryCreate" method="post" value="{{old('main_category')}}">
            <input type="submit" value="追加" class="category-create-btn" form="mainCategoryCreate">
            <form action="{{ route('main.category.create') }}" method="post" id="mainCategoryCreate">{{ csrf_field() }}</form>

            <!-- サブカテゴリーの追加 -->
           <span>メインカテゴリー</span>
           <select class="main_category_select" form="subCategoryCreate" name="post_main_category_id">
            <option selected disabled>----</option>
            @foreach($main_categories as $main_category)
            <option label="{{ $main_category->main_category }}" value="{{$main_category->id}}"></option>
            @endforeach
           </select>


           <span>新規サブカテゴリー</span>
           <input type="text" class="sub_category_form" name="sub_category" form="subCategoryCreate" method="post" valie="{{old('sub_category')}}">
          <input type="submit" value="追加" class="category-create-btn" form="subCategoryCreate">
         <form action="{{ route('sub.category.create') }}" method="post" id="subCategoryCreate">{{ csrf_field() }}</form>


         </div>
      </div>

      <!-- 右側 -->
      <div class="category-right-box">
          <span>カテゴリー一覧</span>
            @foreach($main_categories as $main_category)
              <span class="main_category">{{$main_category->main_category}}</span>

        <!-- $has_sub_categoryを使用してサブカテゴリーの有無を判断 -->
      @php
      $has_sub_category = false;
      foreach($sub_categories as $sub_category) {
        if($main_category->id == $sub_category->post_main_category_id) {
          $has_sub_category = true;
          break;
        }
      }
    @endphp

           @foreach($sub_categories as $sub_category)
          @if($main_category->id == $sub_category->post_main_category_id)
          <span>{{ $sub_category->sub_category }}</span>
          <!-- 削除ボタン -->
          <!-- 削除メソッドをフォームタグで受け取る↓ -->
          <form action="{{ route('sub.category.delete') }}" method="POST">
          @csrf
          <!-- サブカテゴリーidを送る -->
          <input type="hidden" name="id" value="{{ $sub_category->id }}">
          <!-- サブカテゴリーに紐づくメインカテゴリーidを送る -->
          <input type="hidden" name="main_category_id" value="{{ $main_category->id }}">
          <!-- 削除を確定させるボタン -->
          <button type="submit" class="category_delete-button">削除</button>
        </form>
          @endif
          @endforeach

               <!-- サブカテゴリーが存在しない場合の削除ボタン -->
    @if(!$has_sub_category)
      <!-- 削除メソッドをフォームタグで受け取る↓ -->
      <form action="{{ route('main.category.delete') }}" method="POST">
        @csrf
        <!-- メインカテゴリーidを送る -->
        <input type="hidden" name="id" value="{{ $main_category->id }}">
        <!-- 削除を確定させるボタン -->
        <button type="submit" class="category_delete-button">削除</button>
      </form>
    @endif
           @endforeach
      </div>
  </div>
</form>
@endsection
