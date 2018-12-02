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

        if (!$request->user()->hasRole($role)) {

        }
        return $next($request);
    }


}
