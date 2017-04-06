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
        $employees = Employee::get_all_from_workspace();
        return view('restaurant_app.employees.index', compact('employees'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        return view('restaurant_app.employees.create', ['restaurants' => $restaurants]);
    }

    public function store(EmployeeRequest $request)
    {
        $employee = new Employee;
        $employee->workspace_id = getWorkspace()->id;
        $employee->fullname = $request->fullname;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->people_id = $request->people_id;
        $employee->birthday = $request->birthday;
        $employee->avatar = $request->avatar;
        $employee->gender = $request->gender;
        $employee->address = $request->address;

        //Crop avatar
        if ($request->avatar != '') {
            $result = crop_image(
                $request->avatar , //file
                $this->employee_avatar_storage, //directory
                $employee->id,
                $request->crop_width,   //width
                $request->crop_height,  //height
                $request->crop_x,   // x position
                $request->crop_y    // y position
            );
            if ($result) {
                $employee->avatar = $result;
            }
        }else {
            $employee->avatar = $this->user_avatar_default_url;
        }
        if($employee->save()){
            return redirect()->route('employees.show',[ getWorkspaceUrl(), $employee->id ]);
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
        $employee->fullname = $request->fullname;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->people_id = $request->people_id;
        $employee->birthday = $request->birthday;
        $employee->gender = $request->gender;
        $employee->address = $request->address;

        //Crop avatar
        if ($request->avatar != '') {
            $result = crop_image(
                $request->avatar , //file
                $this->employee_avatar_storage, //directory
                $employee->id,
                $request->crop_width,   //width
                $request->crop_height,  //height
                $request->crop_x,   // x position
                $request->crop_y    // y position
            );
            if ($result) {
                $employee->avatar = $result;
            }
        }
        if( $employee->save() ){
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
        $restaurant = Restaurant::with('employees.works')->findOrFail($restaurant_id);
        $employees = $restaurant->employees->unique();
        foreach ($employees as $key => $employee) {
            $works = $employee->works->where('status',0);
            foreach ($works as $key => $work) {
                $works = $works->forget($key);
            }
            dd($works);
        }
        dd($employees);
        return view($this->restaurant_app_view_location.'.restaurants.employees.index',[
                'restaurant' => $restaurant,
                'employees' => $employees,
                'menu_active' => 'employees',
            ]);
    }

}
