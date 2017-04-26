<?php

namespace App\Http\Controllers\RestaurantApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if( getWorkspaceAdmin()->restaurantAdmin() ){
    		return view($this->restaurant_app_view_location . '.restaurants.show',[
    			'restaurant' => getWorkspaceAdmin()->restaurant,
			]);
    	}
    	return 'dashboard';
    }
}
