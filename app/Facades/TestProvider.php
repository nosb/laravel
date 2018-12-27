<?php
namespace App\Facades;

use Illuminate\Support\ServiceProvider;

class TestProvider extends ServiceProvider{


    public function register()
    {
        $this->app->singleton('tests', function () {
            return new Tests();
        });

        $this->app->singleton('test2', function () {
            return new Test2();
        });
    }
}