<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Employee;

class WorkRequest extends FormRequest
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
        $work_id = $this->route('work');
        return [
            'restaurant_id' => 'required',
            'start_date' => 'date_format:d/m/Y',
            'end_date' => 'date_format:d/m/Y|after:start_date',
            'status' => Rule::unique('works')->ignore($work_id)->where(function ($query) {
                if($this->route('employee')){
                    $employee = Employee::findOrFail($this->route('employee'));
                    $employee_id = '';
                    if ($employee->work_active) {
                        $employee_id = $employee->id;
                    }
                }
                $query->where('employee_id', $employee_id);
            }),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'status.unique' => 'The employee is working at another restaurant',
        ];
    }

}
