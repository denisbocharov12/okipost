<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthToken
{
    public function handle($request, Closure $next)
    {
        $_auth_token = $request->header('X-Auth-Token');

        if ($_auth_token !== config('api_token')['token'])
        {
            return response()->json(['status'=>0,'message'=>'No auth token provided.'],401);
        }
        return $next($request);
    }
}
