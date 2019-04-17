<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    public function index(){

        //Log::channel('mytest')->error(222);
        /*$res = User::updateOrCreate(
            ['name' => '1'],
            ['email' => '123333@qq.com','password'=>123456]
        );*/

        echo 1;
    }
}
