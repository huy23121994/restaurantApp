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
    function __construct()
    {
        $this->middleware('workspace_access');
    }
    
    public function index($workspace, $employee_id)
    {
        $employee = Employee::with('works.restaurant')->findOrFail($employee_id);
        $works = $employee->works;
        return view($this->restaurant_app_view_location . '.employees.works.index',[
            'works' => $works,
            'employee' => $employee,
            'current_work' => $works->where('status',1)->first(),
            'menu_active' => 'work_info',
        ]);
    }

    public function create($workspace, $employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        return view($this->restaurant_app_view_location . '.employees.works.create',[
            'restaurants' => getWorkspace()->restaurants,
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
        $status = 1;
        if ($request->status == '') {
            $status = 0;
        }
        $work->status = $status;
        if ( $work->save() ) {
            return redirect()->route('works.show',[
                'workspace' => $workspace->url,
                'employee' => $employee_id,
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
            'restaurants' => getWorkspace()->restaurants,
            'menu_active' => 'work_info',
        ]);
    }

    public function update(WorkRequest $request, $workspace, $employee_id, $id)
    {
        // dd($request->all());
        $workspace = getWorkspace();
        $work = Work::findOrFail($id);
        $work->workspace_id = $workspace->id;
        $work->restaurant_id = $request->restaurant_id;
        $work->employee_id = $employee_id;
        $work->start_date = $request->start_date;
        $work->end_date = $request->end_date;
        $status = 1;
        if ($request->status == '') {
            $status = 0;
        }
        $work->status = $status;
        if ( $work->save() ) {
            return redirect()->route('works.show',[
                'workspace' => $workspace->url,
                'employee' => $employee_id,
                'work' => $work->id
            ]);
        }
    }

    public function destroy($workspace, $employee_id, $id)
    {
        $work = Work::findOrFail($id);
        if ($work->delete()) {
            return redirect()->route('works.index',[
                'workspace' => getWorkspace()->url,
                'employee' => $employee_id
            ]);
        }
    }
}
