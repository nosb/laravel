<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{
    public function index(){

        dd('master');
        //Log::channel('mytest')->error(222);
        /*$res = User::updateOrCreate(
            ['name' => '1'],
            ['email' => '123333@qq.com','password'=>123456]
        );*/







        /*for($i = 0;$i< 100000;$i++){
            Redis::hset('testRedis','test'.$i,$i);
        }*/
     /*   Redis::pipeline(function ($pipe) {
            for ($i = 0; $i < 100000; $i++) {
                $pipe->hset('testRedis','test'.$i,$i);
            }
        });*/

        $t1 = microtime(true);

        for($i = 0;$i < 10000; $i++){
            DB::table('test')->insert([
                'name'=>$i.'name',
                'age'=>$i
            ]);
        }
        $t2 = microtime(true);
        echo '<br />';
        echo $t2-$t1;
    }
}
