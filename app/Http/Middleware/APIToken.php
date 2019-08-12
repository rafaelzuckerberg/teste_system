<?php

namespace App\Http\Middleware;

use Closure;

class APIToken
{

    public function handle($request, Closure $next)
    {
        if($request->header('Authorization')) {
            return $next($request);
        }
        return response()->json([
            'message'   =>  'Token inválido'
        ]);
    }
}
