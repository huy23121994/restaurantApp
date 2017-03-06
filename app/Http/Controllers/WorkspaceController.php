<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WorkspaceRequest;
use App\Models\Workspace;
use Auth;

class WorkspaceController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $workspaces = $user->workspaces;
        $active_sidebar = 'active';
        return view('workspaces.index', compact('workspaces'))
            ->with('w',$active_sidebar);
    }

    public function create()
    {
        return view('workspaces.create');
    }

    public function store(WorkspaceRequest $request)
    {
        $workspace = new Workspace;
        $workspace->name =  $request->name;
        $workspace->description =  $request->description;
        $workspace->url =  $request->url;
        $workspace->user_id =  $request->user_id;
        if ($request->hasFile('avatar')) {
            $result = save_image( $request->avatar, $this->workspace_avatar_storage, $request->url);
            if ($result) {
                $workspace->avatar = $result;
            }
        }else{
            $workspace->avatar =  $this->workspace_avatar_default_url;
        }
        $workspace->save();

        if ($workspace) {
            return redirect('workspaces/'.$workspace->url);
        }
    }

    public function show($url)
    {
        $workspace = Workspace::where('url',$url)->firstOrFail();
        $this->authorize('show-workspace', $workspace); //Check Authorize

        return view('workspaces.show', ['workspace' => $workspace]);
    }

    public function update(WorkspaceRequest $request, $url)
    {
        $workspace = Workspace::where('url',$url)->firstOrFail();
        $this->authorize('show-workspace', $workspace);

        $workspace->name =  $request->name;
        $workspace->description =  $request->description;
        $workspace->url =  $request->url;
        if ($request->hasFile('avatar')) {
            $result = save_image( $request->avatar, $this->workspace_avatar_storage, $request->url);
            if ($result) {
                $workspace->avatar = $result;
            }
        }
        $workspace->save();

        if ($workspace) {
            return redirect('workspaces/'.$workspace->url)->with('status', 'Workspace updated');;
        }
    }

    public function destroy(Workspace $workspace)
    {
        if ($workspace->delete()) {
            return redirect('workspaces');
        }
    }
}
