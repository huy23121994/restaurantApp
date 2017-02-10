<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workspace;
use Storage;

class WorkspaceController extends Controller
{
    public function index()
    {
        $workspaces = Workspace::all();
        $active_sidebar = 'active';
        return view('workspaces.index')
            ->with('w',$active_sidebar)
            ->with('workspaces', $workspaces);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('workspaces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $workspace = new Workspace;
        $workspace->name =  $request->name;
        $workspace->description =  $request->description;
        $workspace->url =  $request->url;
        $workspace->user_id =  $request->user_id;
        if ($request->hasFile('avatar')) {
            $result = save_image( $request->avatar, 'workspace_covers/', $request->url);
            if ($result) {
                $workspace->avatar = $result;
            }
        }else{
            $workspace->avatar =  '/img/cover_default.jpg';
        }
        $workspace->save();

        if ($workspace) {
            return redirect('/workspaces/'.$workspace->url);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $workspace = Workspace::where('url',$url)->first();
        return view('workspaces.show', ['workspace' => $workspace]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
