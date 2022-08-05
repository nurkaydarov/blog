<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if(isset($data['tag_ids']))
            {
                $tagIds = $data['tag_ids'];
                unset($data["tag_ids"]);
            }
            $folder = date('Y-m-d');

            if(isset($data['preview_image']))
            {
                $data['preview_image'] = Storage::disk('public')->put("image/$folder", $data['preview_image']);
            }
            if(isset($data['main_image']))
            {
                $data['main_image'] = Storage::disk('public')->put("image/$folder", $data['main_image']);
            }
            $post = Post::query()->firstOrCreate($data);
            if (isset($tagIds))
            {
                $post->tags()->attach($tagIds);

            }
            session()->flash('success', 'Post has been added');
            DB::commit();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post, $request)
    {
        try {
            DB::beginTransaction();
            if(isset($data['tag_ids']))
            {
                $tagIds = $data['tag_ids'];
                unset($data["tag_ids"]);
            }


            $folder = date('Y-m-d');

            if(isset($data['preview_image']))
            {
                $data['preview_image'] = Post::uploadImage($request, 'preview_image', $post->preview_image);
            }
            if(isset($data['main_image']))
            {
                $data['main_image'] = Post::uploadImage($request, 'main_image', $post->main_image);
            }

            if (isset($tagIds))
            {
                $post->tags()->attach($tagIds);
                $post->tags()->sync($tagIds);
            }

            $post->update($data);

            session()->flash('success', 'Post has been updated');
            DB::commit();
            return $post;
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            abort(500);
        }


    }
}
