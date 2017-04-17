<?php

namespace App\Http\Controllers\RestaurantApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view($this->restaurant_app_view_location . '.orders.index',[
            'orders' => getWorkspace()->orders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->restaurant_app_view_location . '.orders.create', [
            'foods' => getWorkspace()->foods,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request, $workspace)
    {
        $order = new Order([
            'order_id' => $request->order_id,
            'customer' => $request->customer,
            'address' => $request->address,
            'description' => $request->description,
        ]);
        if (getWorkspace()->orders()->save($order)) {
            foreach ($request->foods as $key => $food) {
                $food_data = explode('|', $food);
                $order->foods()->attach($food_data[0], ['number' => $food_data[1]]);
            }
            return redirect()->route('orders.show',[getWorkspaceUrl(),$order->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($workspace, $order_id)
    {
        $order = Order::with('foods')->findOrFail($order_id);
        return view($this->restaurant_app_view_location . '.orders.show', [
            'order' => $order,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($workspace, $order_id)
    {
        $order = Order::with('foods')->findOrFail($order_id);
        return view($this->restaurant_app_view_location . '.orders.edit', [
            'foods' => getWorkspace()->foods,
            'order' => $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $workspace, Order $order)
    {
        $result = $order->update([
            'order_id' => $request->order_id,
            'customer' => $request->customer,
            'address' => $request->address,
            'description' => $request->description,
        ]);
        if ($result) {
            $order->foods()->detach();
            foreach ($request->foods as $key => $food) {
                $food_data = explode('|', $food);
                $order->foods()->attach($food_data[0], ['number' => $food_data[1]]);
            }
            return redirect()->route('orders.show',[getWorkspaceUrl(),$order->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($workspace, Order $order)
    {
        if ($order->delete()) {
            return redirect()->route('orders.index',[getWorkspaceUrl()]);
        }
    }
}
