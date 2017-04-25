<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WorkspaceAdminRequest;
use App\Models\Workspace;
use App\Models\WorkspaceAdmin;

class WorkspaceAdminController extends Controller
{
    public function store(WorkspaceAdminRequest $request, $workspace_url)
    {
        $workspace = Workspace::where('url', $workspace_url)->first();
        $w_admin = new WorkspaceAdmin;
        $w_admin->username = $request->username;
        $w_admin->password = $request->password;
        $w_admin->workspace_id = $workspace->id;
        if ( $w_admin->save() ) {
            return response()->json([
                'id' => $w_admin->id,
                'username' => $w_admin->username,
                'password' => $w_admin->password,
                'workspace_id'=> $w_admin->workspace_id,
            ]);
        } 
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
