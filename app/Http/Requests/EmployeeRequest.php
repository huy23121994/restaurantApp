<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Employee;
use App\Models\Workspace;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $workspace = Workspace::where('url',$this->route('workspace'))->first();
        $workspace_id = $workspace->id;
        $except_id = '';
        if($this->route('employee')){
            $employee = Employee::where('id',$this->route('employee'))->first();
            $except_id = $employee->id;
        }
        return [
            'fullname' => 'required|min:5',
            'email' => 'email',
            'avatar' => 'image',
            'people_id' => 'unique:employees,people_id,'.$except_id,
            'people_id' => 'unique:employees,people_id,NULL,'.$except_id.',workspace_id,'.$workspace_id,
        ];
    }
}
