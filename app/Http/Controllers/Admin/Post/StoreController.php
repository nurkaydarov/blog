<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends \App\Http\Controllers\Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            $data = $request->validated();
            $tagIds = $data['tag_ids'];
            unset($data["tag_ids"]);
            $folder = date('Y-m-d');

            $data['preview_image'] = Storage::disk('public')->put("image/$folder", $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put("image/$folder", $data['main_image']);


            $post = Post::query()->firstOrCreate($data);
            $post->tags()->attach($tagIds);
            session()->flash('success', 'Post has been added');
            return redirect()->route('admin.posts.index');
        }
        catch (\Exception $exception)
        {
            abort(404);
        }

    }
}
