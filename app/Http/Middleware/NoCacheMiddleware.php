<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NoCacheMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('Cache-Control','no-cache, no-store, must-revalidate');
        $response->header('Pragma','no-cache');
        $response->header('Expires','0');
        return ($response);
    }
}
