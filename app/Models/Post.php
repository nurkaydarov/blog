<?php

namespace App\Models;

use App\Http\Requests\Admin\Post\UpdateRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = false;

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public static function uploadImage(UpdateRequest $request, $imageRequest, $image = null)
    {
        if($request->hasFile($imageRequest))
        {
            if($image)
            {
                Storage::disk('public')->delete($image);
            }
            $folder = date('Y-m-d');
            return $request->file($imageRequest)->store("images/{$folder}", 'public');
        }
        return $image;

    }
}
