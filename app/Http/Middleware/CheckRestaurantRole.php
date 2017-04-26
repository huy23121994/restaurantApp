<?php

namespace App\Http\Middleware;

use Closure;

class CheckRestaurantRole
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
        if( getWorkspaceAdmin()->restaurantAdmin() ){
            abort('403');
        }
        return $next($request);
    }
}
