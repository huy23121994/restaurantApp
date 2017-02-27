<?php

namespace App\Http\Controllers\RestaurantApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index($value='')
    {
    	return 'dashboard';
    }
}
