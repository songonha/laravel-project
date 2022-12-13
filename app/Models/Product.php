<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const QUANTITY_DEFAULT = 1;

    protected $fillable = [
        'product_category_id',
        'name',
        'slug',
        'description',
        'quantity',
        'input_price',
        'price',
        'image',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details');
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'comment_products');
    }

    public function comments()
    {
        return $this->hasMany(CommentProduct::class)->orderBy('created_at', 'DESC');
    }
}
