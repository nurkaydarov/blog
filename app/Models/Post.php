<?php

namespace App\Models;

use App\Http\Requests\Admin\Post\UpdateRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = false;
    protected $withCount = ['likedUsers'];

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likedPosts (){
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function likedUsers(){
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }


    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }



    public function getCommentsCount()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
    public function getDateFromCarbon()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->format('F d, Y H:i');

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
