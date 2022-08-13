<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $table = 'tb_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'nickname',
        'display_name',
        'avatar_url',
        'cover_url',
        'long_bio',
        'short_bio',
        'website',

    ];

    /**
     * The model's default values for attributes.
     *
     */
    protected $attributes = [
        'role_id' => 3,
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /**
     * Many-to-One relationship with the Role model.
     * 
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * One to one relationship with SocialMedia model
     */
    public function socialMedia()
    {
        return $this->belongsTo(SocialMedia::class);
    }

    /**
     * One to many relationship with Post model
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * One to many relationship with Comment model
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * One to many relationship with Reply model
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
