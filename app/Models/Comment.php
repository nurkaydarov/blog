<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'message',
        'user_id',
        'post_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function dateAsCarbon():Attribute
    {
        return Attribute::make(
          get: fn ($value) =>  Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->diffForHumans()
        );
    }

}
