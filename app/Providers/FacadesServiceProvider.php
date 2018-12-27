<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Facades\Redis\Redis;
use App\Facades\Test\Test;

class FacadesServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('opRedis', function () {
            return new Redis();
        });

        $this->app->singleton('test', function () {
            return new Test();
        });
    }
}
