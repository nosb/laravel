<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Filesystem\Cache;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $request->myRole = $role;

       // $request->session()->put('name','111111');
      //  session(['test'=>'1111111']);
        return $next($request);
    }


    public function terminate($request, $response)
    {
        $request->session()->put('name','111111');
    }

}
