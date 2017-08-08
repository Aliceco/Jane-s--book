<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topics;
class TopicsController extends Controller
{
    public function show(Topics $topics)
    {
        // 传递带文章数的专题
        $topics = Topics::withCount('postTopics')->find($topics->id);
        // 专题的文章列表，按照创建时间倒序排列，前10个
        $posts = $topics->posts()->orderBy('created_at', 'desc')->take(10)->get();
        // 属于我的文章，但是未投稿
        $myposts = \App\Post::authorBy(\Auth::id())->where('status', 1)->topicNotBy($topics->id)->get();
//        dd($myposts);
        return view("topics/show", compact('topics', 'posts', 'myposts'));
    }
    public function submit(Topics $topics)
    {
        // 验证
          $this->validate(request(),[
               'post_ids' => 'required|array'
          ]);
        // 逻辑
         $post_ids = request('post_ids');
         $topics_id = $topics->id;
         foreach($post_ids as $post_id){
             \App\PostTopics::firstOrCreate(compact('topics_id', 'post_id'));
         }
        // 渲染
        return back();
    }
}
