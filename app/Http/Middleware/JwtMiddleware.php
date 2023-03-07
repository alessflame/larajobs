<?php

namespace App\Http\Middleware;

use App\Exceptions\JwtException;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
*/
    public function handle(Request $request, Closure $next)
    {
        try{
         JWTAuth::parseToken()->authenticate();
        }catch(Exception $e){
            $error= new JwtException();
            return $error->register($e);
        }
        return $next($request);
    }
}
