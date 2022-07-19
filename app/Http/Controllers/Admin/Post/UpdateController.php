<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends \App\Http\Controllers\Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        //dd($request->validated());
        //dd($post->main_image);
        $data = $request->validated();
        $tagIds = $data['tag_ids'];
        unset($data["tag_ids"]);
        $folder = date('Y-m-d');

        $data['preview_image'] = Post::uploadImage($request, 'preview_image', $post->preview_image);
        $data['main_image'] = Post::uploadImage($request, 'main_image', $post->main_image);

        $post->tags()->attach($tagIds);
        $post->update($data);
        $post->tags()->sync($tagIds);
        session()->flash('success', 'Post has been updated');
        return redirect()->route('admin.posts.index');
    }
}
