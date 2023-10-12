<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Posts\Post;
use App\Models\Categories\MainCategory;  //メインカテゴリーモデルを使用

class SubCategory extends Model
{
    //post_sub_categoriesテーブルと紐付ける↓
    protected $table = 'post_sub_categories';
    const CREATED_AT = null;
    const UPDATED_AT = null;
    const DELETED_AT = null;
    // カラムの追加↓
    protected $fillable = [
        'post_main_category_id',
        'sub_category',
    ];

    //Postモデルのリレーション
    public function posts(){
        return $this->hasMany('App\Models\Posts\Post');
    }

    //Main categoriesモデルのリレーション
    public function mainCategory(){
        return $this->belongsTo('App\Models\Categories\MainCategory');
    }

}
