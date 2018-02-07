<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
<<<<<<< HEAD
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
=======
        if (Auth::guard($guard)->check()) { 
            return redirect('/');
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
        }

        return $next($request);
    }
}
