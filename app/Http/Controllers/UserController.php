<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return redirect('/workspaces');
    }

    public function edit()
    {
        $user = Auth::user();
        $active_sidebar = 'active';
        return view('users.edit')->with('p',$active_sidebar);
    }

    public function update(UserRequest $request)
    {
        $user = Auth::user();
        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->address = $request->address;

        //Crop avatar
        if ($request->avatar != '') {
            $result = crop_image(
                $request->avatar , //file
                $this->user_avatar_storage, //directory
                $user->username,    // set file name
                $request->crop_width,   //width
                $request->crop_height,  //height
                $request->crop_x,   // x position
                $request->crop_y    // y position
            );
            if ($result) {
                $user->avatar = $result;
            }
            
        }

        if ($user->save()) {
            return back()->with('status', 'Profile updated');
        }
    }

}
