<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Test
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->test_taken != 0){
            //Session::flash('warning','**You are not allowed to perform this action**');
            return redirect()->back()->with('message','Already given test');

        }
      
        return $next($request);
    }
}
