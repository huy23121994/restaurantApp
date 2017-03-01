<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Workspace;

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
        if (Workspace::checkLogin()) {
            return $next($request);
        }
        return redirect(session()->get('workspace')->url.'/login')->with('errors','Please Login!');
    }
}
