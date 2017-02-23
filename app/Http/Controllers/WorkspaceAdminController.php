<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WorkspaceAdminRequest;
use App\Workspace;

class WorkspaceAdminController extends Controller
{
    public function store(WorkspaceAdminRequest $request, Workspace $workspace)
    {
        $w_admin = new \App\WorkspaceAdmin;
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
