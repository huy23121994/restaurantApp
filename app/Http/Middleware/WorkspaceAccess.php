<?php

namespace App\Http\Middleware;

use Closure;

class WorkspaceAccess
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
        $route = $request->route();
        if ($route->food) {
            $resource = \App\Models\Food::findOrFail($route->food);
        }elseif ($route->employee) {
            $resource = \App\Models\Employee::findOrFail($route->employee);
        }elseif ($route->restaurant) {
            $resource = \App\Models\Restaurant::findOrFail($route->restaurant);
        }elseif ($route->order) {
            $resource = \App\Models\Order::findOrFail($route->order);
        }elseif ($route->admin) {
            $resource = \App\Models\WorkspaceAdmin::findOrFail($route->admin);
        }
        if ($route->workspace == $resource->workspace->url) {
            return $next($request);
        }
        return redirect()->route('restaurants.index',[getWorkspaceUrl()]);
    }
}
