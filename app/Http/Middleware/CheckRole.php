<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null  $guard
     * @param  string $role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$params)
    {
        $guard = null ;
        if (Auth::guard($guard)->check()) {
            if(in_array(Auth::user()->roluser,$params)){
                return $next($request);
            }
        }
        return redirect('/home');
    }
}