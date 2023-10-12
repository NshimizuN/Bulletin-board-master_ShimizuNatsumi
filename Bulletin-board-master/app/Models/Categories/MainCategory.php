<?php

namespace App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories\SubCategory;  //サブカテゴリーモデルを使用

class MainCategory extends Model
{
    //post_main_categoriesテーブルと紐付ける↓
    protected $table = 'post_main_categories';
    // 作成、編集、削除された時間を記録↓
    const CREATED_AT = null;
    const UPDATED_AT = null;
    const DELETED_AT = null;
    // カラムの追加↓
    protected $fillable = [
        'main_category'
    ];

    //Sub Categoriesモデルのリレーション
    public function subCategories(){
        return $this->hasMany('App\Models\Categories\SubCategory');
    }
}
