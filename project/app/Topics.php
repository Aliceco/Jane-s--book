<?php

namespace App;

use App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Topics extends Authenticatable
{
    protected $rememberTokenName = null;
    protected $guarded  = [];
    // 属于这个专题的所有文章
    public function posts()
    {
        return  $this->belongsToMany(\App\Post::class, 'post_topics', 'topics_id', 'post_id');
    }

    // 专题的文章数, 用于withCount
    public function postTopics()
    {
       return $this->hasMany(\App\PostTopics::class, 'topics_id');
    }
}
