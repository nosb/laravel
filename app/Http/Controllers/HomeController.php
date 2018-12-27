<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Myfacade;
Use Test;
use App\Rules\Testrule;
use Validator;
use Auth;
use Illuminate\Support\Facades\Log;


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
        $message = '这是一个测试日记';
        Log::emergency($message);
        Log::alert($message);
        Log::critical($message);
        Log::error($message);
        Log::warning($message);
        Log::notice($message);
        Log::info($message);
        Log::debug($message);

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

        dd($result);

    }





}
