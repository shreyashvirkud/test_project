<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // if (Auth::guard($guard)->check()) {
            //     return redirect()->route('admin.home');


            //     // if($guard === 'admin'){
            //     //     return redirect()->route('admin.home');

            //     // }
            //     // return redirect()->route('ho.home');

            //     //return redirect(RouteServiceProvider::HOME);
            // }

            // if (Auth::guard($guard)->check()) {

            //     if ($guard === 'ho') {
            //         return redirect()->route('ho.home');
            //     }
            //     return redirect()->route('admin.home');
            //     // return redirect(RouteServiceProvider::HOME);
            // }



            if (Auth::guard($guard)->check()) {

                if ($guard === 'admin') {
                    return redirect()->route('admin.home');
                }
                return redirect()->route('home');
                // return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
