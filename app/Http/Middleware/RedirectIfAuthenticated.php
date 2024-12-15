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

    // public function handle($request, Closure $next, $guard = null)
    // {
    //     if (Auth::guard($guard)->check()) {
    //         return redirect('/home');
    //     }
    //     return $next($request);
    // }
    public function handle($request, Closure $next, $guard = null)
    {
        // // dd($guard, Auth::guard($guard)->check());
        switch ($guard) {
                // case 'super-admin':
                //     if (Auth::guard($guard)->check()) {
                //         return redirect()->intended(route('super-admin.dashboard'));
                //     }
                //     break;
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->intended(route('admin.dashboard'));
                }
                break;
            case 'manager':
                if (Auth::guard($guard)->check()) {
                    return redirect()->intended(route('manager.dashboard'));
                }
                break;
            case 'employee':
                if (Auth::guard($guard)->check()) {
                    return redirect()->intended(route('employee.dashboard'));
                }
                break;
            case 'customer':
                if (Auth::guard($guard)->check()) {
                    return redirect()->intended(route('customer.dashboard'));
                }
                break;
            case 'user':
                if (Auth::guard($guard)->check()) {
                    return redirect()->intended(route('user.dashboard'));
                }
                break;
            case 'client':
                if (Auth::guard($guard)->check()) {
                    return redirect()->intended(route('client.dashboard'));
                }
                break;
            case 'front-desk':
                if (Auth::guard($guard)->check()) {
                    return redirect()->intended(route('front-desk.dashboard'));
                }
                break;
                // case 'service-provider':
                //     if (Auth::guard($guard)->check()) {
                //         return redirect()->intended(route('provider.dashboard'));
                //     }
                //     break;
                // case 'admin-staff':
                //     if (Auth::guard($guard)->check()) {
                //         return redirect()->intended(route('admin-staff.dashboard'));
                //     }
                //     break;
                // case 'dist-user':
                //     if (Auth::guard($guard)->check()) {
                //         return redirect()->intended(route('dist.dashboard'));
                //     }
                //     break;
                // case 'vndr-user':
                //     if (Auth::guard($guard)->check()) {
                //         return redirect()->intended(route('vndr.dashboard'));
                //     }
                //     break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/');
                }
                break;
        }
        return $next($request);
    }
}
