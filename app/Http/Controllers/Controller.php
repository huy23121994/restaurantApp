<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $restaurant_app_view_location = 'restaurant_app';

    protected 
    	$user_avatar_default_url = '/img/user.png',
    	$user_avatar_storage = 'user_avatars/',
    	$workspace_avatar_default_url = '/img/workspace_avatar_default.jpg',
    	$workspace_avatar_storage = 'workspace_avatars/',
    	$restaurant_avatar_default_url = '/img/restaurant_avatar_default.jpg',
    	$restaurant_avatar_storage = 'restaurant_avatars/',
    	$employee_avatar_default_url = '/img/employee_avatar_default.jpg',
    	$employee_avatar_storage = 'employee_avatars/';
}
