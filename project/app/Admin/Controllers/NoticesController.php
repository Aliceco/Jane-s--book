<?php
namespace App\Admin\Controllers;
class NoticesController extends Controller
{
    public function index()
    {
        $notices = \App\Notices::all();
        return view("admin.notices.index", compact('notices'));
    }

    public function create()
    {
        return view("admin.notices.create");
    }

    public function store()
    {
      $this->validate(request(),[
          'title'=> 'required|string',
          'content'=> 'required|string'
      ]);

      $notices = \App\Notices::create(request(['title', 'content']));

      dispatch(new \App\Jobs\SendMessage($notices));

      return redirect("/admin/notices");
    }
    public function noticesStatus(\App\Notices $notices)
    {
       $notices->delete();
       return[
          'error' => 0,
           'msg' => ''
       ];
    }
}