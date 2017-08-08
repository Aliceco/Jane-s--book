<?php
namespace App\Admin\Controllers;
class SlideController extends Controller
{
    public  function index ()
    {
        $slide = \App\Slide::all();
        return  view("admin.slide.index", compact('slide'));
    }
    public function create()
    {
        return  view("admin.slide.create");
    }
    public function addStatus()
    {
          $this->validate(request(), [
              'describe'=> 'required',
              'link'=> 'required',
          ]);
         $path = request('avatar')->storePublicly(time());

         $describe = request('describe');
         $link = request('link');
         $avatar = "/storage/". $path;

         $data = array(
             'describe' => $describe,
             'link' => $link,
             'url' => $avatar
         );

         \App\Slide::create($data);

        return redirect("/admin/slide");

    }
    // 删除
    public function deleteStatus(\App\Slide $slide)
    {
        $slide->delete();
        return [
           'error' => 0,
            'msg' => ''
        ];
    }

    // 修改
    public function update(\App\Slide $slide)
    {
       return view("admin.slide.edit", compact("slide"));
    }
    public function updateStatus(\App\Slide $slide)
    {
        $this->validate(request(), [
            'describe'=> 'required',
            'link'=> 'required',
        ]);
        $path = request('avatar')->storePublicly(time());

        $describe = request('describe');
        $link = request('link');
        $avatar = "/storage/". $path;

        $slide->describe = $describe;
        $slide->link = $link;
        $slide->url = $avatar;
        $slide->save();
        return redirect("/admin/slide");
    }
}