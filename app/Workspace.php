<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\WorkspaceAdmin;

class Workspace extends Model
{
    protected $fillable = [
        'name', 'description','url', 'avatar', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function admins()
    {
    	return $this->hasMany('App\WorkspaceAdmin');
    }

    public static function checkLogin()
    {
        $workspace = session()->get('workspace');
        if ( session()->has($workspace->url.'-admin') ) {
            return true;
        }
    }
}
