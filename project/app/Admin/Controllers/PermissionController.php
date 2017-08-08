<?php
namespace App\Admin\Controllers;
class PermissionController extends Controller
{
    // 权限列表
    public  function index ()
    {
        $permissions = \App\AdminPermission::paginate(10);
        return  view("admin.permission.index", compact('permissions'));
    }
    // 创建页面
    public function create()
    {
        return  view("admin.permission.add");
    }
    // 创建行为
    public function store()
    {
        $this->validate(request(),[
            'name' => 'required|min:3',
            'description' => 'required'
        ]);
        \App\AdminPermission::create(request(['name', 'description']));
        return redirect('/admin/permissions');
    }
    // 修改
    public function update(\App\AdminPermission $permissions)
    {
        return  view("admin.permission.update", compact('permissions'));
    }
    public function updateStore(\App\AdminPermission $permissions)
    {
        $this->validate(request(),[
            'name'=> 'required|min:3',
            'description' => 'required'
        ]);
        //逻辑
        $permissions->name = request('name');
        $permissions->description = request('description');
        $permissions->save();

        //渲染
        return redirect("/admin/permissions");
    }
    // 删除
    public function delete(\App\AdminPermission $permissions)
    {
        $src = $permissions->delete();
//        // 渲染
       if( $src ){
            return [
                'error' => 0,
                'msg' => ''
            ];
        }

    }
}