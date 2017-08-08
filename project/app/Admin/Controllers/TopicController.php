<?php
namespace App\Admin\Controllers;
use \App\Topics;
class TopicController extends Controller
{
    public  function index ()
    {
        $topic = Topics::paginate(10);
        return  view("admin.topic.index", compact('topic'));
    }
    public function create()
    {
        return  view("admin.topic.create");
    }
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|max:16',
       ]);

        $name = request('name');
        Topics::create(compact("name"));

        return redirect('/admin/topics');
    }
    public function topicStatus(\App\Topics $topics)
    {
        $src = $topics->where('id', request('topics'))->delete();
        if( $src ){
            return [
                'error' => 0,
                'msg' => '',
            ];
        }

    }
}