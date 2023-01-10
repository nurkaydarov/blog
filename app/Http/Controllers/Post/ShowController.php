<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;

class ShowController extends \App\Http\Controllers\Controller
{
    public function __invoke(Post $post)
    {
        $relatedPosts = Post::query()->where('category_id', '=', $post->categories->id)
            ->where('category_id', '!=', $post->categories->id)->get()->take(4);
        return view('post.show', compact('post', 'relatedPosts'));
    }
}
