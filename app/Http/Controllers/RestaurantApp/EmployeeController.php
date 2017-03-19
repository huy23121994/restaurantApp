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
        return view('restaurant_app.employees.create');
    }

    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create([
            'avatar' => $request->avatar,
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'address' => $request->address,
            'gender' => $request->gender,
        ]);
        if($employee){
            return redirect('/employees');
        }

    }

    public function show($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            return view('restaurant_app.employees.show', compact('employee'));
        }else{
            abort('404_user');
        }
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('restaurant_app.employees.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
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
                'employee_active' => 'Restaurant Employee tab active',
            ]);
    }

    public function edit_in_restaurant($workspace, $restaurant_id, $id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);
        $employees = $restaurant->employees;
        return view($this->restaurant_app_view_location.'.restaurants.employees.edit',[
                'restaurant' => $restaurant,
                'employees' => $employees,
                'employee_active' => 'Restaurant Employee tab active',
            ]);
    }

    public function create_in_restaurant($workspace, $restaurant_id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);
        $employees = $restaurant->employees;
        return view($this->restaurant_app_view_location.'.restaurants.employees.create',[
                'restaurant' => $restaurant,
                'employees' => $employees,
                'employee_active' => 'Restaurant Employee tab active',
            ]);
    }

}
