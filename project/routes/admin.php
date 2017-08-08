<?php
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
        });


    });

});