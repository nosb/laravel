<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
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

        //数据库监听
        DB::listen(function ($query) {
            echo $query->sql.PHP_EOL; //sql语句
           // var_dump($query->bindings); //绑定的参数
           // echo  $query->time; // 运行的时间
        });
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
