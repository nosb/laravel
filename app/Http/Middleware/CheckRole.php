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
    public function handle($request, Closure $next)
    {





        $response = $next($request);

        $response->header('Access-Control-Allow-Origin', '*');
        //$response->header('Cache-Control', 'max-age=20,public');
        $response->header('Access-Control-Allow-Headers', '*');
        $response->header('Access-Control-Expose-Headers', 'Authorization, authenticated');
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
        $response->header('Access-Control-Allow-Credentials', 'true');
        $response->header('Etag','11111111');
      //  $response->header('yf', $request->header('If-None-Match'));
        return $response;

    }



}
