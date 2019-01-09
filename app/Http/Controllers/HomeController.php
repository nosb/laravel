<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Log;
use Test;
use OpRedis;



/**˙
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
echo 1;exit;

        $url = "http://ip.taobao.com/service/getIpInfo.php?ip=127.0.0.1";

        $post_data = [
            'ip'=>'119.96.149.112',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);
        echo $output;exit;



        //Myfacade::readString();
        //Test::getOne();
        //return Auth::getDefaultDriver();
        //$request->session()->push('user.teams', 'developers')
        //$request->session()->flash('status', 'Task was successful!');
        // dd(session()->getId(),session()->all());
        //return view('home')
        //$head = $request->header('Accept');
        //dd($head);
        return response('Hello World', 300)->header('Content-Type', 'text/plain');
    }

    public function testRules(Request $request){
        $messages = [
            'required' => 'The :attribute field is required.',
        ];

        $rules = [
            'name' => 'required',
        ];

        $validator = validator()->make($request->all(), $rules, $messages);
        dd($validator->messages());
    }

    public function log(){
       echo 1;exit;

    }


    public function collection(){

        $collection = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 100],
        ]);
        $collection = collect([1, 2, 3, 4, 5]);
        $arr = [];
        $result =  $collection->contains(function ($value, $key)use($arr) {
           if($key == 1){
               $arr[] = $value;
           }
           return $arr;

        });

        Test::getOne();
        echo  Test::show();

    }


    public function myFacades(){

       $res = OpRedis::setUserInfo(1,'2222');
       dd($res);

    }





}
