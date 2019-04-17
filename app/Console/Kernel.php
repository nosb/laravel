<?php

namespace App\Console;

use App\Console\Commands\myTest;
use App\Console\Commands\order;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        myTest::class,
        order::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        //$schedule->command('route:list')->everyMinute()->sendOutputTo($filePath);
       /* $schedule->call(function (){
            Log::channel('mytest')->error(time());
        })->everyMinute();*/
        $filePath = 'test.txt';
        //$schedule->command('test')->everyMinute()->appendOutputTo($filePath);
        //$schedule->command('sync:order 1')->everyMinute()->appendOutputTo($filePath);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
