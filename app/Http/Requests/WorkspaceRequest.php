<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkspaceRequest extends FormRequest
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
        // return [
        //     'url' => 'required|max:25|unique:workspaces,url,'.$user->id,
        //     'fullname' => 'required|max:25|min:6',
        //     'email' => 'required|email|max:25|unique:users,email,'.$user->id,
        //     'avatar' => 'image|max:1000',
        // ];
    }
}
