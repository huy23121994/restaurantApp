<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Workspace;

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
        $workspace = Workspace::where('url', $request->route()->workspace )->firstOrFail();
        session(['workspace' => $workspace]);
        $request->workspace = $workspace;
        return $next($request);
    }
}
