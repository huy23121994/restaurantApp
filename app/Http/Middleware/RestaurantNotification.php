<?php

namespace App\Http\Middleware;

use Closure;

class RestaurantNotification
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
        $admin = \App\Models\WorkspaceAdmin::find(getWorkspaceAdmin()->id);
        if( $admin->restaurantAdmin() ){
            $orders = $admin->restaurant->orders->where('status.value',0);
            session(['order_not_proccessed' => count($orders)]);
        }
        return $next($request);
    }
}
