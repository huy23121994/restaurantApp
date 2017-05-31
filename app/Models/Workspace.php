<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $fillable = [
        'name', 'description','url', 'avatar', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function admins()
    {
    	return $this->hasMany(WorkspaceAdmin::class);
    }

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class)->withCount('employees');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    
    public function foods()
    {
        return $this->hasMany(Food::class);
    }
    
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public static function checkLogin()
    {
        $workspace = session()->get('workspace');
        if ( session()->has($workspace->url.'-admin') ) {
            return true;
        }
    }
}
