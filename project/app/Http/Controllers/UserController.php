<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // 个人设置页面
    public function setting (\App\User $user)
    {
         return view('user.setting', compact('user'));
    }
    // 个人设置行为
    public function settingStore (\App\User $user)
    {
        $this->validate(request(),[
            'name' => 'min:3',
        ]);
        $user->name = request('name');

        $path = request('avatar')->storePublicly(md5(time()));
        $user->avatar =  "/storage/". $path;

        $user->save();
        return back();
    }

    // 个人中心页面
    public function show(User $user)
    {
        // 这个人的信息, 包含关注/文章/粉丝
        $user = User::withCount(['stars', 'fans', 'posts'])->find($user->id);

        // 这个人文章列表，取创建时间前10条
        $posts = $user->posts()->orderBy('created_at', 'desc')->take(10)->get();

        //这个人关注的用户，包含关注用户的 关注/粉丝/文章
        $stars = $user->stars;
        $susers = User::whereIn('id', $stars->pluck('star_id'))->withCount(['stars', 'fans', 'posts'])->get();

        //关注这个人的粉丝用户，包含粉丝用户的 关注/粉丝/文章
        $fans = $user->fans;
        $fusers = User::whereIn('id', $fans->pluck('fan_id'))->withCount(['stars', 'fans', 'posts'])->get();

        return view('user.show', compact('user', 'posts', 'susers', 'fusers'));
    }

    // 关注用户
    public function fan(User $user)
    {
       $me = \Auth::user();
       $me->doFan($user->id);
       return [
           'error' => 0,
           'msg' => ''
       ];
    }

    // 取消关注
    public function unfan(User $user)
    {
        $me = \Auth::user();
        $me->doUnfan($user->id);
        return [
            'error' => 0,
            'msg' => ''
        ];
    }
}
