<?php

namespace Modules\Auth\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckApiAuthentication
{
    public function handle($request, Closure $next)
    {#
        if (Auth::guard('api')->guest()) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated',
            ],401);
        }

        return $next($request);
    }
}
