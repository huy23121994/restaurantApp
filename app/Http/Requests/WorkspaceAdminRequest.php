<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkspaceAdminRequest extends FormRequest
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
        $workspace = \App\WorkspaceAdmin::where('username',$this->route('admin'))->first();

        $except_id = '';
        if ($workspace) {
            $except_id = $workspace->id;
        }
        return [
            'username' => 'required|min:5|unique:workspace_admins,username'.$except_id,
            'password' => 'required|min:5',
        ];
    }
}
