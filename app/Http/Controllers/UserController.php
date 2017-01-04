<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $current_username = Auth::user()->username;
        return redirect('/'.$current_username);
    }

    public function show($username)
    {
        $user = User::where('username',$username)->first();
        if ($user) {
            return view('users.show');
        }else{
            abort(404);
        }
    }

    public function edit($username)
    {
        dd($id);
    }

    public function update(Request $request, $username)
    {
        //
    }

}
