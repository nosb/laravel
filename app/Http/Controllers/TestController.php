<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{
    public function index(User $user,Request $request){

    /*    $res = long2ip('2130706432');
        dd($res);
        return redirect()->back()->withInput()->withErrors('保存失败！');
        $users = $user::all();
        dd($users->toJson());*/


return  response()->json(132323);


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
