<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RedirectIfNotAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {
        //Log::info("admin   ".Auth::guard($guard)->check() == true);
        $request->session()->forget("left-bar");

        if (\auth()->guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {

                return response('Unauthorized', 401);

            } else {

                return redirect()->guest('/admin/login');

            }
        }

        $request->session()->flash("left-bar", $request->getRequestUri());

        return $next($request);
    }
}
