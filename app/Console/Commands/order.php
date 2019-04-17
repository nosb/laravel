<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class order extends Command
{
    /**
     *创建artisan命令  php artisan sync:order 1    {id} 是参数
     */
    protected $signature = 'sync:order {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '测试创建artisan';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $param1 = $this->argument('id');

        dd(22222);
        dd(33333333);
    }
}
