<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 5.4 mb4string 767除以4 = 191.xxx
        Schema::defaultStringLength(191);
        \View::composer("layout.sidebar", function($view){
            $topics = \App\Topics::all();
            $view->with('topics', $topics);
        });

//        \DB::listen(function ($query){
//            $sql = $query->sql;
//            $bindings = $query->bindings;
//            $time = $query->time;
//            if($time > 10){
//                \Log::debug(var_export(compact('sql', 'bindings', 'time')));
//            }
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
