<?php

namespace App\Http\Middleware;

use Closure;

class CheckWorkspace
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
        $workspace = \App\Workspace::where('url', $request->route()->workspace )->firstOrFail();
        $request->workspace = $workspace;
        return $next($request);
    }
}
