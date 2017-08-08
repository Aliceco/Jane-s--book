<?php
namespace App\Admin\Controllers;
use App\Post;
class PostsController extends Controller
{
    //  审核首页
    public function index()
    {
         // 因为我定义了全局scope 加上withoutGlobalScope('scope名字')
        $posts = Post::withoutGlobalScope("avaiable")->where("status", 0)->orderBy('created_at', 'desc')->paginate(10);
        return view("admin.post.index", compact("posts"));
    }
    // 审核行为
   public  function status(Post $post)
   {
       // 验证
       $this->validate(request(), [
            'status' => 'required|in:-1,1'
       ]);

      //逻辑
       $post->status = request('status');
       $post->save();

      // 渲染
       return [
           'error' => 0,
           'msg' => ''
       ];

   }
   // 通过的文章
    public function through()
    {
        $posts = Post::where("status", 1)->orderBy('created_at', 'desc')->paginate(10);
        return view("admin.post.through", compact("posts"));
    }
    // 拒绝的文章
    public function refused()
    {
        $posts = Post::withoutGlobalScope("avaiable")->where("status", -1)->orderBy('created_at', 'desc')->paginate(10);
        return view("admin.post.refused", compact("posts"));
    }
    // 删除拒绝的文章
    public function refusedStatus(\App\Post $post)
    {
        $post->delete();
        // 渲染
        return [
            'error' => 0,
            'msg' => ''
        ];
    }
     // 回到审核
    public function backAudit( \App\Post $post)
    {
        // 验证
        $this->validate(request(), [
            'status' => 'required|in:0'
        ]);

        //逻辑
        $post->status = request('status');
        $post->save();

        // 渲染
        return [
            'error' => 0,
            'msg' => ''
        ];
    }
}