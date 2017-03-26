<?php

namespace App\Http\Controllers\RestaurantApp;

use Illuminate\Http\Request;
use App\Http\Requests\WorkRequest;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Work;
use App\Models\Restaurant;

class WorkController extends Controller
{
    public function index($workspace, $employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $works = $employee->works;
        return view($this->restaurant_app_view_location . '.employees.works.index',[
            'works' => $works,
            'employee' => $employee,
            'menu_active' => 'work_info',
        ]);
    }

    public function create($workspace, $employee_id)
    {
        $restaurants = Restaurant::all();
        $employee = Employee::findOrFail($employee_id);
        return view($this->restaurant_app_view_location . '.employees.works.create',[
            'restaurants' => $restaurants,
            'employee' => $employee,
            'menu_active' => 'work_info',
        ]);
    }

    public function store(WorkRequest $request, $workspace, $employee_id)
    {
        $workspace = getWorkspace();
        $work = new Work;
        $work->workspace_id = $workspace->id;
        $work->restaurant_id = $request->restaurant_id;
        $work->employee_id = $employee_id;
        $work->start_date = $request->start_date;
        $work->end_date = $request->end_date;
        if ( $work->save() ) {
            return redirect()->route('works.show',[
                'workspace' => $workspace->url,
                'employee_id' => $employee_id,
                'work' => $work->id
            ]);
        }
    }

    public function show($workspace, $employee_id, $id)
    {
        $employee = Employee::findOrFail($employee_id);
        $work = Work::findOrFail($id);
        return view($this->restaurant_app_view_location . '.employees.works.show',[
            'employee' => $employee,
            'restaurant' => $work->restaurant,
            'work' => $work,
            'menu_active' => 'work_info',
        ]);
    }

    public function edit($workspace, $employee_id, $id)
    {
        $employee = Employee::findOrFail($employee_id);
        $work = Work::findOrFail($id);
        return view($this->restaurant_app_view_location . '.employees.works.edit',[
            'employee' => $employee,
            'work' => $work,
            'menu_active' => 'work_info',
        ]);
    }

    public function update(Request $request, $workspace, $employee_id)
    {
        $work = Work::findOrFail($id);
        $work->workspace_id = $data['workspace_id'];
        $work->employee_id = $data['employee_id'];
        $work->save();
    }

    public function destroy($id)
    {
        //
    }
}
