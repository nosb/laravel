<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class myTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        /*$userId = $this->argument('id');

        //dd(User::find(6)->toArray());
        dd($userId);*/

        //Log::channel('mytest')->error('1111111');

        /**
         *  $schedule->command('test')->everyMinute()->appendOutputTo($filePath);
         * echo 出的内容可以输出到$filePath里面或者是记录到数据库 做日志管理
         */
        //$res = User::find(6,['id'])->toArray();
        //$res = User::first(['id'])->toArray();
        //echo json_encode($res).PHP_EOL;
    }
}
