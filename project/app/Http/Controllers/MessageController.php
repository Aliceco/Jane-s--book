<?php
namespace App\Http\Controllers;
class MessageController extends Controller
{
    public  function index ()
    {
        // 获取当前用户
        $user = \Auth::user();
        $notices = $user->notices;
        return  view("notices/index",compact('notices'));
    }
}