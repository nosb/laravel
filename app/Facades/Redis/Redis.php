<?php
namespace App\Facades\Redis;
use Illuminate\Support\Facades\Redis as pRedis;

class Redis{

    public function setUserInfo($id,$user){
        return pRedis::hset('user',$id,$user);
    }


    public function getUserInfo($id){
        return pRedis::hget('user',$id);
    }
}