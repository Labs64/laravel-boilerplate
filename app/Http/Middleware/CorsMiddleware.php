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
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', ['*'])
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE, PATCH')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, X-XSRF-TOKEN');
    }
}
