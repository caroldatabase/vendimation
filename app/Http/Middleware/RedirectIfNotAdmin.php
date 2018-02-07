<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; 
use Hash;
use App\User;
use App\Admin;
<<<<<<< HEAD
use Request;
use Session;
use View;

=======
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
class RedirectIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */

    protected $redirectTo = 'admin';
    protected $guard = 'admin';

<<<<<<< HEAD
    public function handle($request, Closure $next, $guard = 'web')
    {   
        if (!Auth::guard($guard)->check() && !Auth::guard('admin')->check() ) {
            $request->session()->flush();
            return redirect('admin/login');
        }

        $user= Auth::guard($guard)->user();
        if($user){
            View::share('user',$user);
        }

        if($user && $user->step<5){ 
            $step = $user->step;
             $request->session()->put('user_id', $user->id);
            return redirect('admin/signup/step_'.$step); 
        }

=======
    public function handle($request, Closure $next, $guard = 'admin')
    {   

      // dd(Auth::guard('admin')->attempt($credentials,true));
        if (!Auth::guard($guard)->check()) {

            return redirect('admin/login');
        }
        
>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
        return $next($request);
    }
}