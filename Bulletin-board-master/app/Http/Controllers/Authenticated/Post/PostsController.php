<?php

namespace App\Http\Controllers\Authenticated\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
    //auth認証
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 新規投稿画面を表示
     public function post()
    {
        return view('authenticated.post.post');
    }
}
