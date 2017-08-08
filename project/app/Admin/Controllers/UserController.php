<?php
namespace App\Admin\Controllers;
use App\AdminUser;

class UserController extends Controller
{
    // 管理员逻辑
    public  function index()
    {
         $src = AdminUser::paginate(10);
         return view("/admin/user/index", compact('src'));
    }
   // 创建页面
    public function create()
    {
        return view("/admin/user/add");
    }
   // 创建逻辑
    public function store()
    {
        // 验证
        $this->validate(request(), [
            'name' => 'required|unique:admin_users,name|min:3|max:16',
            'password' => 'required|min:5|max:10|confirmed'
        ]);

        //逻辑
        $name = request('name');
        $password = bcrypt( request('password') );
        AdminUser::create(compact("name", "password"));
        //渲染
        return redirect('/admin/users');

    }
    // 用户角色页面
    public function role(\App\AdminUser  $user)
    {
        $roles = \App\AdminRole::all();
        $myRole = $user->roles;
        return view("/admin/user/role", compact('roles', 'myRole', 'user'));
    }
   // 储存用户角色
    public function storeRole(\App\AdminUser  $user)
    {
        $this->validate(request(), [
            'roles' => 'required|array'
        ]);
        $roles = \App\AdminRole::findMany(request('roles'));
        $myRole = $user->roles;

        // 要增加的
       $addRoles = $roles->diff($myRole);
       foreach ($addRoles as $role) {
           $user->assignRole($role);
       }
        // 要删除的
        $deleteRoles = $myRole->diff($roles);
        foreach ($deleteRoles as $role) {
            $user->deleteRole($role);
        }
        return back();
    }
}