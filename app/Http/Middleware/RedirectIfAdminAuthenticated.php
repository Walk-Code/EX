<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->session()->forget("left-bar");

        if (auth()->guard('admin')->check()) {

            return redirect('/admin');
            
        }

        $request->session()->flash("left-bar", $request->getRequestUri());

        return $next($request);
    }
}
