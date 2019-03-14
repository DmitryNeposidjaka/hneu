<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Authorization, Origin, Content-Type, Cache-Control');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE, PUT');

        return $next($request);
    }
}
