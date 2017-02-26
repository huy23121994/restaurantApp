<?php

namespace App\Http\Controllers\RestaurantApp\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Workspace;
use App\WorkspaceAdmin;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
    	return view('restaurant_app.auth.login',['workspace' => $request->workspace]);
    }

    public function login(Request $request)
    {
        $user = WorkspaceAdmin::where('username', $request->username)->first();
        if ($user) {
            if ($user->password == $request->password) {
                session([$request->workspace->url.'-'.'admin' => $user]);
                return redirect($request->workspace->url.'/employees');
            }else{
                return 'Mật khẩu không đúng';
            }
        }else{
            return 'Không tồn tại tài khoản này';
        }
    }

    public function logout(Request $request, $workspace)
    {
        // session()->forget($request->workspace->url.'-'.'admin');
        // session()->flush();
        dd(session()->all());
    	return redirect( $request->workspace->url . '/login');
    }
}
