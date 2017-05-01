<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        $order = \App\Models\Order::findOrFail($this->route('order'));
        $except = '';
        if ($order) {
            $except = $order->id;
        }
        return [
            'order_id' => 'required|unique:orders,NULL,'. $except .',id,workspace_id,'.$workspace_id,
            'customer' => 'required',
            'address' => 'required',
            'foods' => 'required'
        ];
    }
}
