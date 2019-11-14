<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;

class IndexController extends Controller
{


    public function login(Request $request){
        $input = $request->only('password', 'name');
        $jwt_token = null;

        if (!$jwt_token = auth('api')->attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }

    public function info(){

        dd(auth('api')->user());
    }

    public function logout(){
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
