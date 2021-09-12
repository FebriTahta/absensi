<?php

namespace App\Http\Middleware;
use Auth;
use Illuminate\Http\Request;
use Closure;

class checkrole
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
        if (Auth::check() && Auth::user()) {
            return $next($request);
          }
         return redirect('/');
        // return $next($request);
    }
}
