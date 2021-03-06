<?php

namespace App\Http\Controllers\RestaurantApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Workspace;
use App\Models\Restaurant;
use App\Http\Requests\RestaurantRequest;

class RestaurantController extends Controller
{
    function __construct()
    {
        $this->middleware('workspace_access', ['except' => ['index','create','store','checkRestaurantReady']]);
        $this->middleware('check_restaurant_role', ['except' => 'checkRestaurantReady']);
    }
    
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
        $restaurant->location = [
            'title' => $request->location,
            'lat' => $request->lat,
            'lng' => $request->lng
        ];
        $restaurant->workspace_id = $workspace->id;
        if ($request->hasFile('avatar')) {
            $result = save_image( $request->avatar, $this->restaurant_avatar_storage, uniqid());
            if ($result) {
                $restaurant->avatar = $result;
            }
        }else{
            $restaurant->avatar =  $this->restaurant_avatar_default_url;
        }
        \DB::beginTransaction();
        if ($restaurant->save()) {
            $result = Restaurant::addAllFood($restaurant);
            \DB::commit();
            return redirect()->route('restaurants.edit',[
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
        if( getWorkspaceAdmin()->restaurantAdmin() ){
            $restaurant = getWorkspaceAdmin()->restaurant;
        }else{
            $restaurant = Restaurant::findOrFail($restaurant_id);
        }
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
        return view($this->restaurant_app_view_location.'.restaurants.edit', [
                'restaurant' => $restaurant,
                'menu_active' => 'info',
            ]);
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
        $restaurant->location = [
            'title' => $request->location,
            'lat' => $request->lat,
            'lng' => $request->lng
        ];
        if ($request->hasFile('avatar')) {
            $result = save_image( $request->avatar, $this->restaurant_avatar_storage, $restaurant->id);
            if ($result) {
                $restaurant->avatar = $result;
            }
        }
        if ($restaurant->save()) {
            return redirect()->route('restaurants.edit',[
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
    public function destroy($workspace, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
        if ($restaurant->delete()) {
            return redirect()->route('restaurants.index',[session('workspace')->url]);
        }
    }

    public function checkRestaurantReady(Request $request, $workspace)
    {
        $restaurants = getWorkspace()->restaurants;
        $data = [];

        // Proccess foods data 'x|x' to array [x,x]
        $food_data = [];
        foreach ($request->food_data as $food) {
            $x = explodeData($food);
            $food_data[$x[0]] = $x[1];
        }
        $foods = $request->foods ? $request->foods : [] ;
        
        foreach ($restaurants as $restaurant) {
            $data[$restaurant->id] = ['status' => 1];
            foreach ($restaurant->foods->whereIn('id', $foods) as $food) {
                $data[$restaurant->id]['foods'][$food->id] = [
                    'name' => $food->name,
                    'number' => $food->pivot->number,
                    'status' => 1
                ];
                if ($food_data[$food->id] > $food->pivot->number) {
                    $data[$restaurant->id]['status'] = 0;
                    $data[$restaurant->id]['foods'][$food->id]['status'] = 0;
                }
            }
        }
        return json_encode($data);
    }

}
