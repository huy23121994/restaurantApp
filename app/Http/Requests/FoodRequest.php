<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FoodRequest extends FormRequest
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
        $workspace = \App\Models\Workspace::where('url',$this->route('workspace'))->first();
        $workspace_id = $workspace->id;
        return [
            'name' => 'required',
            'avatar' => 'image',
            'food_id' => 'required|unique:foods,NULL,'.$this->route('food').',id,workspace_id,'.$workspace_id,
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được bỏ trống trường này',
            'image' => 'Dữ liệu phải là ảnh'
        ];
    }
}
