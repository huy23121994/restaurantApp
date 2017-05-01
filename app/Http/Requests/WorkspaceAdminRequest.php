<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\WorkspaceAdmin;
use App\Models\Workspace;

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
        $admin = $this->route('admin');
        if ($admin) {
            $workspace_admin = WorkspaceAdmin::findOrFail($admin);
        }
        $workspace = Workspace::where('url',$this->route('workspace'))->first();
        $except_id = '';
        if (isset($workspace_admin)) {
            $except_id = $workspace_admin->id;
        }
        return [
            'username' => 'required|regex:/^\S*$/u|min:5|unique:workspace_admins,NULL,'.$except_id.',id,workspace_id,'.$workspace->id,
            'password' => 'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'regex' => 'Tên đăng nhập không bao gồm dấu cách trống',
        ];
    }
}
