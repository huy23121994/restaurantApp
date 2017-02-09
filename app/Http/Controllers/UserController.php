<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return redirect('/profile');
    }

    public function edit()
    {
        $user = Auth::user();
        $active_sidebar = 'active';
        if ($user) {
            return view('users.edit')->with('p',$active_sidebar);
        }else{
            abort(404);
        }
    }

    public function update(UserRequest $request)
    {
        $user = Auth::user();
        if ($user) {
            $user->fullname = $request->fullname;
            $user->phone = $request->phone;
            $user->address = $request->address;

            //Crop avatar
            if ($request->avatar != '') {
                $result = crop_image(
                    $request->avatar ,
                    'avatars/',
                    $user->username,
                    $request->crop_width,
                    $request->crop_height,
                    $request->crop_x,
                    $request->crop_y
                );
                if ($result) {
                    $user->avatar = $result;
                }
                
            }

            if ($user->save()) {
                return back()->with('status', 'Profile updated');;
            }

        }else{
            abort(404);
        }
    }

}
