<?php

namespace App\Http\Controllers\RestaurantApp\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Workspace;
use Session;

class LoginController extends Controller
{
    public function showLoginForm($workspace_url)
    {
    	$workspace = Workspace::where('url',$workspace_url)->firstOrFail();
    	return view('restaurant_app.auth.login', compact('workspace'));
    }

    public function login(Request $request, $workspace_url)
    {
        // $request->session()->put('admin','admin');
        // session(['ok' => 'ok']);
        // Session::flush();
        // $request->session()->forget('ok');

        // dd($request->session()->has('ok'));
        dd(Session::all());
    }

    public function logout($workspace_url)
    {
    	$workspace = Workspace::where('url',$workspace_url)->firstOrFail();
    	return view('restaurant_app.auth.login');
    }
}
