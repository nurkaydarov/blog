<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::query()->orderBy('id', 'desc')->paginate(4);

        $randomPosts = Post::query()->get()->random(4);
        $likedPosts = Post::query()->withCount('likedPosts')->orderBy('liked_posts_count', 'desc')->get()->take(4);
        //dd($likedPosts);
        return view('post.index', compact('posts', 'randomPosts', 'likedPosts'));
    }
}
