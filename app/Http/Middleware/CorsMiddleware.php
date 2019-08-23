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
        if($request->is('api/*')) {
            header('Access-Control-Allow-Origin: http://localhost:4200'); 
            header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH'); 
            header('Access-Control-Allow-Headers: Content-Type'); 
        } 
        return $next($request);
    }
}
