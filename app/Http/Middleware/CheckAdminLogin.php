<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            switch (Auth::user()->role) {
                case 1:
                case 2:
                    return $next($request);
                    break;
                default:
                    Session::flash('error', __('admin.not_role'));
                    return response()->view('admin.login.login');
                    break;
            }
           
        }
        Session::flash('error', __('admin.not_login'));

        return response()->view('admin.login.login');
    }
}
