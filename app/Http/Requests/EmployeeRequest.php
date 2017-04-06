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
        return [
            'fullname' => 'required|min:5',
            'email' => 'email',
            'avatar' => 'image',
            'people_id' => Rule::unique('employees')->ignore($except_id)->where(function ($query) {
                $workspace = Workspace::where('url',$this->route('workspace'))->first();
                $workspace_id = $workspace->id;
                $query->where('workspace_id', $workspace_id);
            }),
        ];
    }
}
