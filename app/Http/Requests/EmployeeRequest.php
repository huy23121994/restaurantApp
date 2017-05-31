<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
        $except_id = $this->route('employee');
        $workspace = Workspace::where('url',$this->route('workspace'))->first();
        $workspace_id = $workspace->id;
        
        return [
            'fullname' => 'required|min:5',
            'email' => 'required|email',
            'avatar' => 'image',
            'people_id' => 'required|unique:employees,NULL,'. $except_id .',id,workspace_id,'.$workspace_id,
        ];
    }
}
