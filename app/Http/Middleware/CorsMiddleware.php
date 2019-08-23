<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
        if($request->is('api/*') && \App::environment('local')) {
            // header('Access-Control-Allow-Origin: https://testesystem.herokuapp.com');
            // header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE');
            // header('Access-Control-Allow-Headers: Content-Type');
            header('Access-Control-Allow-Origin: *'); 
            header("Access-Control-Allow-Credentials: true");
            header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
            header('Access-Control-Max-Age: 1000');
            header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
          }
          return $next($request);
    }
}
