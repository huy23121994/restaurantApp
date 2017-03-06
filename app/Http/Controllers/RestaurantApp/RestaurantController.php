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
        $restaurant = Restaurant::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'workspace_id' => $workspace->id,
        ]);
        if ($restaurant) {
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
