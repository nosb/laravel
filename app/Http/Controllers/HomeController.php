<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
       $request->session()->put('test','123');
        session('test','123');
//$request->session()->push('user.teams', 'developers');
        //$request->session()->flash('status', 'Task was successful!');
       // dd(session()->getId(),session()->all());
        //return view('home');
    }



}
