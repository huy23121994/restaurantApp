<?php

namespace App\Http\Controllers\RestaurantApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Food;
use App\Models\WorkspaceAdmin;
use App\Events\UpdateOrderStatus;
use App\Events\DataPusher;

class OrderController extends Controller
{
    function __construct()
    {
        $this->middleware('workspace_access', ['except' => ['index','create','store']]);
        // $this->middleware('check_restaurant_role', [
        //     'except' => ['index','show','create','store','update_status']
        // ]);
        $this->middleware('restaurant_noti', ['except' => ['index','show','update_status']]);
    }
    
    public function index()
    {
        $admin = WorkspaceAdmin::find(getWorkspaceAdmin()->id);
        if ($admin->restaurantAdmin()) {
            $orders = $admin->restaurant->orders;
        }elseif ($admin->globalAdmin()) {
            $orders = $admin->orders;
        }else{
            $orders = getWorkspace()->orders;
        }
        return view($this->restaurant_app_view_location . '.orders.index',[
            'orders' => $orders,
            'restaurant' => getWorkspaceAdmin()->restaurant,
        ]);
    }

    public function create()
    {
        $data = [
            'foods' => getWorkspace()->foods,
            'restaurants' => getWorkspace()->restaurants,
        ];
        $admin = getWorkspaceAdmin();
        if ($admin->restaurantAdmin()) {
            $data['restaurants'] = [$admin->restaurant];
        }
        return view($this->restaurant_app_view_location . '.orders.create', $data);
    }

    public function store(OrderRequest $request, $workspace)
    {
        $order = new Order([
            'order_id' => $request->order_id,
            'customer' => $request->customer,
            'address' => [
                'title' => $request->address,
                'lat' => $request->lat,
                'lng' => $request->lng
            ],
            'description' => $request->description,
            'restaurant_id' => $request->restaurant,
            'status' => $request->status,
            'admin_id' => getWorkspaceAdmin()->id,
        ]);
        \DB::beginTransaction();
        if (getWorkspace()->orders()->save($order)) {
            foreach ($request->foods as $key => $food) {
                $food_data = explodeData($food);
                $result = $order->foods()->attach($food_data[0], ['number' => $food_data[1]]);
                if ($result) \DB::rollBack();
            }
            \DB::commit();
            $data = $order->toArray();
            $data['address'] = $order->address['title'];
            $data['url'] = route('orders.show',[getWorkspaceUrl(),$order->id]);
            $data['restaurant'] = $order->restaurant;
            event(new DataPusher(json_encode($data)));
            return redirect()->route('orders.show',[getWorkspaceUrl(),$order->id]);
        }
    }

    public function show($workspace, $order_id)
    {
        $order = Order::with('foods')->findOrFail($order_id);
        return view($this->restaurant_app_view_location . '.orders.show', [
            'order' => $order,
            'restaurants' => getWorkspace()->restaurants,
        ]);
    }

    public function edit($workspace, $order_id)
    {
        $order = Order::with('foods')->findOrFail($order_id);
        return view($this->restaurant_app_view_location . '.orders.edit', [
            'foods' => getWorkspace()->foods,
            'restaurants' => getWorkspace()->restaurants,
            'order' => $order,
        ]);
    }

    public function update(OrderRequest $request, $workspace, $order)
    {
        $order = Order::find($order);
        $result = $order->update([
            'order_id' => $request->order_id,
            'customer' => $request->customer,
            'address' => [
                'title' => $request->address,
                'lat' => $request->lat,
                'lng' => $request->lng
            ],
            'description' => $request->description,
            'restaurant_id' => $request->restaurant,
            'status' => $request->status,
        ]);
        if ($result) {
            $order->foods()->detach();
            foreach ($request->foods as $key => $food) {
                $food_data = explodeData($food);
                $order->foods()->attach($food_data[0], ['number' => $food_data[1]]);
            }

            $data = $order->toArray();
            $data['address'] = $order->address['title'];
            $data['url'] = route('orders.show',[getWorkspaceUrl(),$order->id]);
            $data['restaurant'] = $order->restaurant;
            event(new DataPusher(json_encode($data)));
            
            return redirect()->route('orders.show',[getWorkspaceUrl(),$order->id]);
        }
    }

    public function destroy($workspace, $order)
    {
        $order = Order::findOrFail($order);
        if ($order->delete()) {
            return redirect()->route('orders.index',[getWorkspaceUrl()]);
        }
    }

    public function update_status(Request $request,$workspace, $order)
    {
        $order = Order::findOrFail($order);
        $update = $order->update(['status' => $request->status]);
        if ($update) {
            $data = json_encode($order);
            event(new UpdateOrderStatus($data));
            
            if ($request->status == 2) {
                $restaurant = $order->restaurant;
                $restaurant->updateFoodNumber($order);
            }
            
            return back();
        }
    }
}
