<?php

namespace App\Http\Controllers\RestaurantApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\Restaurant;
use App\Http\Requests\RestaurantRequest;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( $this->restaurant_app_view_location.'.restaurants.index')
            ->with('restaurants', session('workspace')->restaurants );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( $this->restaurant_app_view_location.'.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        $workspace = session('workspace');
        $restaurant = new Restaurant;
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->location = $request->location;
        $restaurant->workspace_id = $workspace->id;
        if ($request->hasFile('avatar')) {
            $result = save_image( $request->avatar, $this->restaurant_avatar_storage, $request->url);
            if ($result) {
                $restaurant->avatar = $result;
            }
        }else{
            $restaurant->avatar =  $this->restaurant_avatar_default_url;
        }
        if ($restaurant->save()) {
            return redirect()->route('restaurants.show',[
                'workspace' => $workspace->url,
                'restaurant' => $restaurant->id,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($workspace, $restaurant_id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);
        return view($this->restaurant_app_view_location.'.restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($workspace, $restaurant_id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);
        return view($this->restaurant_app_view_location.'.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantRequest $request, $workspace, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->location = $request->location;
        if ($request->hasFile('avatar')) {
            $result = save_image( $request->avatar, $this->restaurant_avatar_storage, $restaurant->id);
            if ($result) {
                $restaurant->avatar = $result;
            }
        }
        if ($restaurant->save()) {
            return redirect()->route('restaurants.show',[
                'workspace' => session('workspace')->url,
                'restaurant' => $restaurant->id,
            ]);
        }
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
