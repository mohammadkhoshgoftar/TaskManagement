<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JsonResponseMiddleware
{

    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($response->status() === 403) {
            return response()->json([
                'status' => false,
                'message' => 'شما دسترسی ندارد',
            ],403);
        }

        return $response;
    }
}
