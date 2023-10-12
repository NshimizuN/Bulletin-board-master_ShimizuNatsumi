<?php

namespace App\Http\Controllers\Authenticated\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories\MainCategory;
use App\Models\Categories\SubCategory;
use Auth;

class CategoryController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }

    //メインカテゴリーに単語を追加
    public function mainCategoryCreate(Request $request){
        MainCategory::create([
            // main_categoryカラムへbladeのformのname属性「main_category」に入った値を追加する
            'main_category' => $request->main_category
        ]);
        // 登録が完了したら、categoryルートを使用してカテゴリーページへ戻る
        return redirect()->route('category');
    }

     //メインカテゴリーを削除する
     public function mainCategoryDelete(Request $request){
         //持ってきた$requestからidを抽出し$idへ代入
        $id = $request->input('id');
        //MainCategoryの$idを探し、削除
        MainCategory::findOrFail($id)->delete();
        return redirect()->route('category');
    }

    //サブカテゴリーに単語を追加
    public function subCategoryCreate(Request $request){
        SubCategory::create([
            // post_main_category_idカラムへbladeのformのname属性「post_main_category_id」に入った値を追加する
            'post_main_category_id' => $request->post_main_category_id,
            //sub_categoryカラムへbladeのformのname属性「sub_category」に入った値を追加する
            'sub_category' => $request->sub_category
        ]);
        // 登録が完了したら、categoryルートを使用してカテゴリーページへ戻る
        return redirect()->route('category');
    }

    //サブカテゴリーを削除する
     public function subCategoryDelete(Request $request){
        //  nameタグidにあるサブカテゴリーidを$idへ代入
         $id = $request->input('id');
        //  上idに該当するサブカテゴリーをテーブルから抽出し、$subCategoryへ代入
         $subCategory = SubCategory::findOrFail($id);
         // サブカテゴリーを削除
         $subCategory->delete();
         return redirect()->route('category');
    }

        // カテゴリー投稿画面を表示,カテゴリーを一覧表示
     public function category()
    {
        // MainCategoryモデルを$main_categoriesへ格納
        $main_categories = MainCategory::get();
        // SubCategoryモデルを$sub_categoriesへ格納
        $sub_categories = SubCategory::get();
        // viewでカテゴリーページへ推移、compactで$main_categories、$sub_categoriesをbladeへ渡す
        return view('authenticated.category.category',compact('main_categories','sub_categories'));
    }
}
