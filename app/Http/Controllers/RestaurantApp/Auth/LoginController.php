<?php

namespace App\Http\Controllers\RestaurantApp\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\WorkspaceAdmin;

class LoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        $workspace = session('workspace');
        if ( !Workspace::checkLogin() ) {
        	return view('restaurant_app.auth.login',['workspace' => $workspace]);
        }else{
            return redirect()->route('ws_dashboard', [$workspace->url]);
        }
    }

    public function login(Request $request)
    {
        $workspace = session('workspace');
        if (!Workspace::checkLogin()) {
            $user = WorkspaceAdmin::where('username', $request->username)->where('workspace_id', $workspace->id)->first();
            if ($user) {
                if ($user->password == $request->password) {
                    session([$workspace->url.'-admin' => $user]);
                    if ($user->restaurantAdmin()) {
                        return redirect($workspace->url);
                    }
                    return redirect($workspace->url.'/employees');
                }else{
                    return back()->with('errors','Mật khẩu không đúng')
                        ->withInput( $request->except('password'));
                }
            }else{
                return back()->with('errors','Không tồn tại tài khoản "'.$request->username.'"');
            }
        }else{
            return redirect()->route('ws_dashboard', [$workspace->url]);
        }
    }

    public function logout(Request $request, $workspace)
    {
        $workspace = session('workspace');
        session()->forget($workspace->url.'-admin');
    	return redirect( $workspace->url . '/login');
    }
}
