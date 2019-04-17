<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{



    public function index(Request $request){
        $data = $request->only(['name','password']);
        $bool = auth()->attempt($data);
        if($bool){
           // return redirect('user/index');
            return redirect()->intended('user/index');
        }

        return response()->json(['msg'=>'用户名密码错误']);
    }


    public function logout(){
        dd(auth()->logout());

    }


    public function username()
    {
        return 'username';
    }

}
