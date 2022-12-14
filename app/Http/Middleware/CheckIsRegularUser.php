<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIsRegularUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(loggedInUserAsRegularUser()){
            return $next($request);
        } else if(auth()->user()->is_admin == 1) {
            abort(403, 'Please log in as a regular user to view this page.');
        } else{
            abort(403, 'You are not authorized.');
        }
    }
}
