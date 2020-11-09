<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Middleware\AdminRegistration as Middleware;

class AdminRegistration extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }
    public function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('adminlogin');
        }
    }
}
