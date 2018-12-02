<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


class UserController extends Controller
{


    public function __construct()
    {
        //$this->middleware('role:editor');
    }

    public function index(Request $request,User $user){
       /* $res = $user::with(['posts'],function ($query){
            $query->where('uid',49);
        });*/
       $res = $user::find(20)->posts;
        $res = $user::findOrFail(51);
        dd($res);
       return response()->json(['123']);
    }
}
