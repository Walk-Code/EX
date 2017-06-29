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
        Log::info("admin   ".Auth::guard($guard)->check());
        $request->session()->forget("left-bar");
        ## 死循环重定向
      /*  if (!Auth::guard('admin')->check()) {
            return redirect('/admin');
        }*/

        $request->session()->flash("left-bar",$request->getRequestUri());

        return $next($request);
    }
}
