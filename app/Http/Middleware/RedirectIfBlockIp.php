<?php

namespace App\Http\Middleware;

use App\Models\BlockList;
use Closure;

class RedirectIfBlockIp
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
        $blockList = new BlockList();

        if ($blockList->isInBlickList($request->getClientIp())) {

            return redirect("/error/ip");

        }

        return $next($request);
    }
}
