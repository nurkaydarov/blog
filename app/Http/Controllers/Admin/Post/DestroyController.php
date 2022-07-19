<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class DestroyController extends \App\Http\Controllers\Controller
{
    public function __invoke(Post $post)
    {
        $post->delete();
        session()->flash('success', 'Post has been deleted');
        return redirect()->route('admin.posts.index');
    }
}
