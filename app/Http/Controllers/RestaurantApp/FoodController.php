<?php

namespace App\Http\Controllers\RestaurantApp;

use Illuminate\Http\Request;
use App\Http\Requests\FoodRequest;
use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\WorkspaceAdmin;
use App\Events\UpdateFoodStatus;

class FoodController extends Controller
{
    function __construct()
    {
        $this->middleware('workspace_access', ['except' => ['index','create','store']]);
        $this->middleware('check_restaurant_role', ['except' => ['index','update_food_number']]);
    }
    
    public function index()
    {
        $admin  = WorkspaceAdmin::find(getWorkspaceAdmin()->id);
        if ($admin->restaurantAdmin()) {
            // For Restaurant Admin
            $restaurant = $admin->restaurant;
            return view($this->restaurant_app_view_location . '.foods.index_restaurant_role', [
              'restaurant' => $restaurant,
              'foods' => $restaurant->foods,
            ]);
        }else{
            // For Global Admin
            $foods = getWorkspace()->foods;
            return view($this->restaurant_app_view_location . '.foods.index', [
              'foods' => $foods,
            ]);
        }
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
        \DB::beginTransaction();
        if ($food->save()) {
            $result = Restaurant::addFoodToAll($food, $request->number);
            if (!$result) {
                \DB::rollBack();
                // return back()->with('notice', 'Bạn cần phải tạo ít nhất một nhà hàng trước khi tạo món ăn!');
            }else{
                \DB::commit();
            }
            return redirect()->route('foods.show',[
                'workspace' => getWorkspaceUrl(),
                'food' => $food->id,
            ]);
        }
    }

    public function show($workspace, $id)
    {
        $food = Food::findOrFail($id);
        return view($this->restaurant_app_view_location . '.foods.show', [
            'food' => $food,
            'restaurants' => $food->restaurants,
        ]);
    }

    public function edit($workspace, $id)
    {
        $food = Food::findOrFail($id);
        return view($this->restaurant_app_view_location . '.foods.edit',[
            'food' => $food,
            'restaurants' => $food->restaurants,
        ]);
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
        if ($request->has('number')) {
            $restaurants = getWorkspace()->restaurants;
            foreach ($restaurants as $restaurant) {
                $restaurant->foods()->updateExistingPivot($food->id, ['number' => $request->number]);
            }
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

    public function updateStatus(Request $request,$workspace, $restaurant, $food)
    {
        $food = Food::findOrFail($food);
        $status = $request->status;
        $status = !$status ? 1 : 0;
        
        $update = $food->restaurants()->updateExistingPivot($restaurant, ['number' => $status]);
        if ($update) {
            $data = collect(['status' => $status , 'food_id' => $food->id])->toJson();
            event(new UpdateFoodStatus($data));
            
            return $data;
        }
    }

    public function index_in_restaurant($workspace, $restaurant)
    {
        $restaurant = Restaurant::findOrFail($restaurant);
        return view($this->restaurant_app_view_location.'.restaurants.foods.index',[
                'restaurant' => $restaurant,
                'foods' => $restaurant->foods,
                'menu_active' => 'foods',
            ]);
    }
    
    public function update_food_number(Request $request, $workspace, $food_id)
    {
        $food = Food::find($food_id);
        $update = $food->restaurants()->updateExistingPivot($request->restaurant_id, ['number' => $request->number]);
        if ($update) {
            return 1;
        }
    }
}
