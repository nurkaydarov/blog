<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        //dd($request->validated());
        //dd($post->main_image);
        $data = $request->validated();
        $post = $this->service->update($data, $post, $request);
        return redirect()->route('admin.posts.index');
    }
}
