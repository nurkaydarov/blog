<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class IndexController extends \App\Http\Controllers\Controller
{
    public function __invoke()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }
}
