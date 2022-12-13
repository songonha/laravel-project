<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_tags');
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags');
    }
}
