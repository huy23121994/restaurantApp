<?php

namespace App\Http\Controllers\RestaurantApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\WorkspaceAdminRequest;
use App\Models\Workspace;
use App\Models\WorkspaceAdmin;
use App\Models\RestaurantRole;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('workspace_access', ['except' => ['index','create','store']]);
        $this->middleware('check_restaurant_role');
    }

    public function index()
    {
        $workspace = Workspace::with('admins.role', 'admins.restaurant')->find(getWorkspace()->id);
        return view('restaurant_app.admins.index', [
            'admins' => $workspace->admins,
        ]);
    }

    public function create()
    {
        return view('restaurant_app.admins.create', [
            'restaurants' => getWorkspace()->restaurants,
            'employees' => getWorkspace()->employees,
            'roles' => RestaurantRole::all(),
        ]);
    }

    public function store(WorkspaceAdminRequest $request, $workspace_url)
    {
        $admin = new WorkspaceAdmin;
        $admin->username = $request->username;
        $admin->password = $request->password;
        $admin->restaurant_id = $request->restaurant_id;
        $admin->role_id = $request->role_id;
        $admin->workspace_id = getWorkspace()->id;
        $admin->employee_id = $request->employee_id;
        if ( $admin->save() ) {
            return redirect()->route('admins.show',[getWorkspaceUrl(),$admin->id]);
        } 
    }

    public function show($workspace, $admin)
    {
        $admin = WorkspaceAdmin::findOrFail($admin);
        return view('restaurant_app.admins.show', compact('admin'));
    }

    public function edit($workspace, $admin)
    {
        $admin = WorkspaceAdmin::findOrFail($admin);
        return view('restaurant_app.admins.edit', [
            'restaurants' => getWorkspace()->restaurants,
            'employees' => getWorkspace()->employees,
            'roles' => RestaurantRole::all(),
            'admin' => $admin
        ]);
    }

    public function update(WorkspaceAdminRequest $request, $workspace, $admin)
    {
        $admin = WorkspaceAdmin::findOrFail($admin);
        $admin->username = $request->username;
        $admin->password = $request->password;
        $admin->restaurant_id = $request->restaurant_id;
        $admin->role_id = $request->role_id;
        $admin->employee_id = $request->employee_id;
        if ( $admin->save() ) {
            session()->flash('notice-success', 'Cập nhật thành công');
            return redirect()->route('admins.show',[getWorkspaceUrl(),$admin->id]);
        } 
    }

    public function destroy($workspace, $admin)
    {
        $admin = WorkspaceAdmin::find($admin);
        $current_admin_id = session()->get(getWorkspaceUrl() . '-admin')->id;
        if ($current_admin_id != $admin->id) {
            $admin->delete();
            session()->flash('notice-success', 'Xóa tài khoản thành công');
        }else{
            session()->flash('notice-fail', 'Không thể xóa tài khoản của chính bạn');
        }
        return redirect()->route('admins.index',[getWorkspaceUrl()]);
    }
}
