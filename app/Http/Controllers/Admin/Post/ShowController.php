<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class ShowController extends \App\Http\Controllers\Controller
{
    public function __invoke(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }
}
