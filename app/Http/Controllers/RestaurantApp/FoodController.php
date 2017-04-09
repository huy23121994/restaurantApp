<?php

namespace App\Http\Controllers\RestaurantApp;

use Illuminate\Http\Request;
use App\Http\Requests\FoodRequest;
use App\Http\Controllers\Controller;
use App\Models\Food;

class FoodController extends Controller
{
    function __construct()
    {
        $this->middleware('workspace_access', ['except' => ['index','create','store']]);
    }
    
    public function index()
    {
        $foods = getWorkspace()->foods;
        return view($this->restaurant_app_view_location . '.foods.index', [
          'foods' => $foods,
        ]);
    }

    public function create()
    {
        return view($this->restaurant_app_view_location . '.foods.create');
    }

    public function store(FoodRequest $request)
    {
        $food = new Food;
        $food->name = $request->name;
        $food->food_id = $request->food_id;
        $food->description = $request->description;
        $food->workspace_id = getWorkspace()->id;
        if ($request->hasFile('avatar')) {
            $result = save_image( $request->avatar, $this->food_avatar_storage, uniqid());
            if ($result) {
                $food->avatar = $result;
            }
        }else{
            $food->avatar =  $this->food_avatar_default_url;
        }
        if ($food->save()) {
            return redirect()->route('foods.show',[
                'workspace' => getWorkspaceUrl(),
                'food' => $food->id,
            ]);
        }
    }

    public function show($workspace, $id)
    {
        $food = Food::findOrFail($id);
        return view($this->restaurant_app_view_location . '.foods.show', compact('food'));
    }

    public function edit($workspace, $id)
    {
        $food = Food::findOrFail($id);
        return view($this->restaurant_app_view_location . '.foods.edit', compact('food'));
    }

    public function update(FoodRequest $request, $workspace, $id)
    {
        $food = Food::findOrFail($id);
        $food->name = $request->name;
        $food->food_id = $request->food_id;
        $food->description = $request->description;
        if ($request->hasFile('avatar')) {
            $result = save_image( $request->avatar, $this->food_avatar_storage, uniqid());
            if ($result) {
                $food->avatar = $result;
            }
        }else{
            $food->avatar =  $this->food_avatar_default_url;
        }
        if ($food->save()) {
            return redirect()->route('foods.show',[
                'workspace' => getWorkspaceUrl(),
                'food' => $food->id,
            ]);
        }
    }

    public function destroy($workspace, $id)
    {
        $food = Food::findOrFail($id);
        if ($food->delete()) {
            return redirect()->route('foods.index',[getWorkspaceUrl()]);
        }
    }
    
}
