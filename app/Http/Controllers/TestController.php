<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function index(User $user,Request $request){

    /*    $res = long2ip('2130706432');
        dd($res);
        return redirect()->back()->withInput()->withErrors('保存失败！');
        $users = $user::all();
        dd($users->toJson());*/


    phpinfo();
    exit;
	    $pid = pcntl_fork();
//父进程和子进程都会执行下面代码
	    if ($pid == -1) {
		    //错误处理：创建子进程失败时返回-1.
		    die('could not fork');
	    } else if ($pid) {
		    Log::info("p进程". pcntl_wait($status));
		    pcntl_wait($status); //等待子进程中断，防止子进程成为僵尸进程。
	    } else {
		    Log::info("子进程".$pid);
		    //子进程得到的$pid为0, 所以这里是子进程执行的逻辑。
	    }







    }


    public function getError(){

        return view('welcome');

    }


    public function setRedis(){
        Redis::hset('video','1111111',123);
        dd(1);
        $redis = file_get_contents('/Users/apple/myPro/yfapi/80892.txt');
        $rediss = json_decode($redis,true);
        dd($rediss);
        echo time().'------';
        foreach ($rediss as $k=> $v){
            Redis::hset('video',$k,json_encode($v));
        }
        echo time().'------';
    }
}
