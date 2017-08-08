<?php

namespace App;

use App\Model;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;

// 表 => posts （默认）
class Post extends Model
{
      use Searchable;
      // 定义索引里面的type
      public function searchableAs()
      {
          return "post";
      }
      // 定义那些字段需要搜索
      public function toSearchableArray()
      {
           return[
               'title' => $this->title,
               'content' => $this->content
           ];
      }

    public function user ()
      {
          return $this->belongsTo('App\User', 'user_id', 'id');
      }

      // 评论模型
    public function comments()
    {
        return $this->hasMany('App\Comments')->orderBy('created_at', 'desc');
    }

    // 和用户进行关联
    public function zan($user_id)
    {
        return $this->hasOne(\App\Zans::class)->where('user_id', $user_id);
    }

    // 文章的所有赞
    public function zans()
    {
        return $this->hasMany(\App\Zans::class);
    }

    // 属于某个作者的文章
    public function scopeAuthorBy($query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }
    public function postTopics()
    {
        return $this->hasMany(\App\PostTopics::class, 'post_id');
    }
    // 不属于某个专题的文章
    public function scopeTopicNotBy(Builder $query, $topics_id)
    {
        return $query->doesntHave('postTopics', 'and', function($q) use ($topics_id) {
            $q->where("topics_id", $topics_id);
        });
    }

    // 全局scope的方式
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope("avaiable", function(Builder $builder){
            $builder->whereIn('status', [0, 1, -1]);
        });
    }
}
