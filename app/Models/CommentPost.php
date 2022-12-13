<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function getCreatedAtAttribute($val)
    {
        return \Carbon\Carbon::parse($val)->diffForHumans();
    }
}
