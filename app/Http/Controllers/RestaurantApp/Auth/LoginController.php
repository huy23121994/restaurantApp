<?php

namespace App\Http\Controllers\RestaurantApp\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Workspace;

class LoginController extends Controller
{
    public function showLoginForm($workspace_url)
    {
    	$workspace = Workspace::where('url',$workspace_url)->firstOrFail();
    	return view('restaurant_app.auth.login', compact('workspace'));
    }

    public function login(Request $request, $workspace_url)
    {
        session(['ws_admin' => 'admin']);
        session()->forget('ok');

        dd(session()->all());
    }

    public function logout($workspace_url)
    {
    	$workspace = Workspace::where('url',$workspace_url)->firstOrFail();
    	return view('restaurant_app.auth.login');
    }
}
