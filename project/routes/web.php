<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', "\App\Http\Controllers\LoginController@index");
// 用户模块
   //注册页面
Route::get('/register', '\App\Http\Controllers\RegisterController@index');
  //注册行为
Route::post('/register', '\App\Http\Controllers\RegisterController@register');
  //登录页面
Route::get('/login', '\App\Http\Controllers\LoginController@index');
  //登录行为
Route::post('/login', '\App\Http\Controllers\LoginController@login');

// 前台路由
Route::group(['middleware' => 'auth:web'], function(){
    Route::get('/logout', '\App\Http\Controllers\LoginController@logout');
    //个人设置页面
    Route::get('/user/{user}/setting', '\App\Http\Controllers\UserController@setting');
    //个人设置操作
    Route::post('/user/{user}/setting', '\App\Http\Controllers\UserController@settingStore');

// 文章列表页
    Route::get('/posts', '\App\Http\Controllers\PostController@index');
// 创建文章
    Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
    Route::post('/posts', '\App\Http\Controllers\PostController@store');

//图片上传
    Route::post('/posts/img/upload', '\App\Http\Controllers\PostController@imgUpload');
// 搜索页
    Route::get('/posts/search', '\App\Http\Controllers\PostController@search');

// 文章的详情页
    Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
// 编辑文章
    Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
    Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
// 删除文章
    Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');

// 提交评论
    Route::post('/posts/{post}/comment', '\App\Http\Controllers\PostController@comment');

// 赞
    Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostController@zan');
//取消赞
    Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostController@unzan');

// 个人中心
    Route::get('/user/{user}', '\App\Http\Controllers\UserController@show');
// 关注用户
    Route::post('/user/{user}/fan', '\App\Http\Controllers\UserController@fan');
// 取消关注
    Route::post('/user/{user}/unfan', '\App\Http\Controllers\UserController@unfan');


// 专题详情页
    Route::get('/topics/{topics}', '\App\Http\Controllers\TopicsController@show');
// 投稿
    Route::post('/topics/{topics}/submit', '\App\Http\Controllers\TopicsController@submit');

    // 通知
    Route::get('/notices', '\App\Http\Controllers\MessageController@index');

});

// 后台路由
//include_once("admin.php");

Route::group(['prefix' => 'admin'], function () {
    // 登录页面
    Route::get('/login', '\App\Admin\Controllers\LoginController@index');
    // 登录行为
    Route::post('/login', '\App\Admin\Controllers\LoginController@login');
    // 登出行为
    Route::get('/logout', '\App\Admin\Controllers\LoginController@logout');
    Route::group(['middleware' => 'auth:admin'], function(){
        // 首页
        Route::get('/home', '\App\Admin\Controllers\HomeController@index');

        Route::group(['middleware' => 'can:system'], function(){
            // 管理人员展示
            Route::get('/users', '\App\Admin\Controllers\UserController@index');
            // 添加页面
            Route::get('/users/create', '\App\Admin\Controllers\UserController@create');
            // 添加逻辑
            Route::post('/users/store', '\App\Admin\Controllers\UserController@store');
            // 用户角色页面
            Route::get('/users/{user}/role', '\App\Admin\Controllers\UserController@role');
            // 储存用户角色
            Route::post('/users/{user}/role', '\App\Admin\Controllers\UserController@storeRole');


            // 角色列表
            Route::get('/roles', '\App\Admin\Controllers\RoleController@index');
            // 角色创建页
            Route::get('/roles/create', '\App\Admin\Controllers\RoleController@create');
            // 创建行为
            Route::post('/roles/store', '\App\Admin\Controllers\RoleController@store');
            // 角色权限关系页面
            Route::get('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@permission');
            // 储存角色权限的行为
            Route::post('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@storePermission');

            // 权限列表
            Route::get('/permissions', '\App\Admin\Controllers\PermissionController@index');
            // 角色创建页
            Route::get('/permissions/create', '\App\Admin\Controllers\PermissionController@create');
            // 创建行为
            Route::post('/permissions/store', '\App\Admin\Controllers\PermissionController@store');
            // 修改
            Route::get('/permissions/{permissions}/update', '\App\Admin\Controllers\PermissionController@update');
            Route::put('/permissions/{permissions}/updateStore', '\App\Admin\Controllers\PermissionController@updateStore');
            // 删除
            Route::post('/permissions/{permissions}/delete', '\App\Admin\Controllers\PermissionController@delete');
        });

        Route::group(['middleware' => 'can:posts'], function(){
            // 审核模块
            Route::get('/posts', '\App\Admin\Controllers\PostsController@index');
            // 审核行为
            Route::post('/posts/{post}/status', '\App\Admin\Controllers\PostsController@status');

            // 通过文章页面
            Route::get('/posts/through', '\App\Admin\Controllers\PostsController@through');

            // 拒绝的文章页面
            Route::get('/posts/refused', '\App\Admin\Controllers\PostsController@refused');
            // 删除拒绝的文章
            Route::post('/posts/{post}/refusedStatus', '\App\Admin\Controllers\PostsController@refusedStatus');
            // 回到审核
            Route::post('/posts/{post}/backAudit', '\App\Admin\Controllers\PostsController@backAudit');
        });

        Route::group(['middleware' => 'can:topic'], function(){
            Route::resource('topics', '\App\Admin\Controllers\TopicController', ['only' => ['index', 'create', 'store']]);
            Route::post('/topics/{post}/topicStatus', '\App\Admin\Controllers\TopicController@topicStatus');
        });

        Route::group(['middleware' => 'can:notices'], function(){
            Route::resource('notices', '\App\Admin\Controllers\NoticesController', ['only' => ['index', 'create', 'store']]);
            Route::post('/notices/{notices}/noticesStatus', '\App\Admin\Controllers\NoticesController@noticesStatus');
        });

        Route::group(['middleware' => 'can:slide'], function(){
            // 幻灯片
            Route::get('/slide', '\App\Admin\Controllers\SlideController@index');
            // 添加
            Route::get('/slide/create', '\App\Admin\Controllers\SlideController@create');
            Route::post('/slide/addStatus', '\App\Admin\Controllers\SlideController@addStatus');
           // 删除
            Route::post('/slide/{slide}/deleteStatus', '\App\Admin\Controllers\SlideController@deleteStatus');
           // 修改
            Route::get('/slide/{slide}/update', '\App\Admin\Controllers\SlideController@update');
            Route::put('/slide/{slide}/updateStatus', '\App\Admin\Controllers\SlideController@updateStatus');

        });

    });

});

