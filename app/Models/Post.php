<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'tb_posts';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'topic_id',
        'user_id',
        'is_actived',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function postStatistics()
    {
        return $this->hasOne(PostStatistics::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
