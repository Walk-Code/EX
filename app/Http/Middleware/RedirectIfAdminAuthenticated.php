<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RedirectIfAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = 'admin')
    {
        Log::info("admin");
        $request->session()->forget("left-bar");

        if (!Auth::guard($guard)->user()) {
            return redirect('/admin/login');
        }

        $request->session()->flash("left-bar",$request->getRequestUri());

        return $next($request);
    }
}
