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

    public function all()
    {
        $input = parent::all();

        $input['url'] = str_slug($input['url']);

        return $input;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $workspace = \App\WorkSpace::where('url',$this->route('workspace'))->first();

        $except_id = '';
        if ($workspace) {
            $except_id = $workspace->id;
        }
        return [
            'url' => 'required|max:25|unique:workspaces,url,'.$except_id,
            'name' => 'required|max:25|min:6',
            'description' => 'max:200',
            'avatar' => 'image|max:1000',
        ];
    }
}
