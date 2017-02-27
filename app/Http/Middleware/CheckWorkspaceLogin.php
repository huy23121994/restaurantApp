<?php

namespace App\Http\Middleware;

use Closure;

class CheckWorkspaceLogin
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
        if (\App\Workspace::checkLogin()) {
            return $next($request);
        }
        return redirect(session()->get('workspace')->url.'/login')->with('errors','Please Login!');
    }
}
