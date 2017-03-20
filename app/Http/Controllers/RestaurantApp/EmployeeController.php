<?php

namespace App\Http\Controllers\RestaurantApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Restaurant;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::get_all();
        return view('restaurant_app.employees.index', compact('employees'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        return view('restaurant_app.employees.create', ['restaurants' => $restaurants]);
    }

    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->all());
        if($employee){
            return redirect()->route('employees.show',[ getWorkspaceUrl(), $employee->id ])->withInput();
        }else{
            return back();
        }

    }

    public function show($workspace, $id)
    {
        $employee = Employee::findOrFail($id);
        return view('restaurant_app.employees.show', [
            'employee' => $employee,
            'menu_active' => 'basic_info',
        ]);
    }

    public function edit($workspace,$id)
    {
        $employee = Employee::findOrFail($id);
        return view('restaurant_app.employees.edit',  [
            'employee' => $employee,
            'menu_active' => 'basic_info',
        ]);
    }

    public function update(EmployeeRequest $request,$workspace, $id)
    {
        $employee = Employee::findOrFail($id);
        if( $employee->update($request->all()) ){
            return redirect()->route('employees.show',[ getWorkspaceUrl(), $employee->id ]);
        }else{
            return back();
        }
    }

    public function destroy($workspace, $id)
    {
        $employee = Employee::findOrFail($id);
        if ($employee->delete()) {
            return redirect()->route('employees.index',[getWorkspaceUrl()]);
        }
    }

    /**
     * Display a listing of the employee in each restaurant.
     *
     * @param  string  $workspace, int $restaurant_id
     * @return \Illuminate\Http\Response
     */
    public function index_in_restaurant($workspace, $restaurant_id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);
        $employees = $restaurant->employees;
        return view($this->restaurant_app_view_location.'.restaurants.employees.index',[
                'restaurant' => $restaurant,
                'employees' => $employees,
                'menu_active' => 'employees',
            ]);
    }

    public function edit_in_restaurant($workspace, $restaurant_id, $id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);
        $employees = $restaurant->employees;
        return view($this->restaurant_app_view_location.'.restaurants.employees.edit',[
                'restaurant' => $restaurant,
                'employees' => $employees,
                'menu_active' => 'employees',
            ]);
    }

    public function create_in_restaurant($workspace, $restaurant_id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);
        $employees = $restaurant->employees;
        return view($this->restaurant_app_view_location.'.restaurants.employees.create',[
                'restaurant' => $restaurant,
                'employees' => $employees,
                'menu_active' => 'employees',
            ]);
    }

}
