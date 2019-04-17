<?php

namespace App\Http\Controllers;

use App\Jobs\TranslateSlug;
use App\Posts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;



class UserController extends Controller
{



    public function __construct(){
        //$this->middleware('auth');
    }


    public function index(Request $request,User $user){
       /* $res = $user::with(['posts'],function ($query){
            $query->where('uid',49);
        });*/


        //return $request->session()->get('name');

        //$phone = User::where('id',6)->with('ssss:uid')->get()->toArray();

        //dd($phone);



      /*  $ret = DB::table('posts')->distinct()->get(['uid']);;
        dd($ret);*/
       // $query = DB::table('users')->select('name');

        /*$users = $query->addSelect('email')->get();
        dd($users);*/
/*        $role = 2;
        $users = DB::table('users')
            ->when($role, function ($query, $role) {
                return $query->where('id', $role);
            })
            ->get();
dd($users);*/



   /*   $res =  DB::select(
   "select *,case id when 10 then '法师' else '战士' end as 'sex' from users");
      dd($res);*/




    }


    public function show(User $user){

         //隐式路由
        //{user}名字要和$user一致 默认是根据主键来查新 如果要指定别的字段 在模型里面设置getRouteKeyName()
        //Route::get('user/{user}', 'UserController@show');
        dd($user);
    }


    public function test(Request $request){

        //dd($request->input('id'));
        /*if ($request->is('user/*')) {
            dd(11111111);
        }*/

        //dd($request->url());  //http://la.com/user/test
        //dd($request->fullUrl());  //http://la.com/user/test?a=1

        $data['name'] = $request->name;

        $rules = [
            'name' => 'required|max:2',
        ];
        $messages = [
            'name' => '标题', //视图页面会生成，The "字段名称" field is required
        ];
        $arr = [
            'name' => '标题', //视图页面会生成，The "字段名称" field is required
        ];

        $validator = Validator::make($data, $rules, $messages,$arr);
        if ($validator->fails()) {
            $res = $validator->errors()->first();
            dd($res);
        }
    }


    public function rs(Request $request){
       /* return response('Hello World', 200)
            ->header('Content-Type', 'text/plain')
            ->header('Param','yf');*/
        /*return response()->json([
            'name' => 'Abigail',
            'state' => 'CA'
        ]);*/
        return response()
            ->json(['name' => 'Abigail', 'state' => 'CA'])
            ->withCallback($request->input('callback'));
    }

    public function ck(){
        return response('123',200)
            ->header('Content-Type', 'text-plain')
            ->cookie('name', 'yf');
    }

    public function view(){
          return view('child');
    }


    public function code(Request $request){

        $validator = Validator::make($request->all(),  ['captcha' => 'required|captcha']);
        if ($validator->fails())
        {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        }
        else
        {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }

        $res = $request->input('captcha');

       dd(1);
    }


    //关联模型
    public function models(User $user){
       // $res = User::find(8)->posts;
        //$res = Posts::find(8)->roles;

        $users = User::all();

     /*   $names = $users->reject(function ($user) {
            return $user->password != '123456';
        })->map(function ($user) {
                return $user->name;
            });*/

     echo Carbon::now();
        $res = Carbon::parse('2019-03-01 09:27:53')->addSeconds('3600')->isPast();

dd($res);
        Log::stack(['single', 'mytest'])->info('Something happened!');
        $user = Test::FindOrFail(1);

        $firstName = $user->email;
        $firstName = $user->name;
        dd($firstName);
    }


    public function resource(){

        return UserResource::collection(User::all());
    }


    public function queue(){
        //$phone = User::where('id',6)->with('ssss:uid')->get()->toArray();

        //dd($phone);
        $users = User::where('id',">",10)->get();
        $this->dispatch((new TranslateSlug())->onQueue('test'));

    }


}
