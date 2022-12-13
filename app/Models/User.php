<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    const IMAGE_MALE = '/storage\/uploads\/users\/male.png';
    const IMAGE_FEMALE = '/storage\/uploads\/users\/female.jpg';
    const ROLE_MEMBER = 0;
    const ROLE_ADMIN = 1;
    const ROLE_STORE_OWNER = 2;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dateOfBirth',
        'gender',
        'address',
        'phone',
        'email',
        'password',
        'role',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function commentPosts()
    {
        return $this->hasMany(CommentPost::class);
    }

    public function commentProducts()
    {
        return $this->hasMany(CommentProduct::class);
    }
}
