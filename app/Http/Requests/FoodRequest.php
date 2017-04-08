<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        
        return [
            'name' => 'required',
            'food_id' => 'required|unique:foods,food_id,'.$this->route('food'),
            'avatar' => 'image'
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
