<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $fillable = [
        'name', 'description','url', 'avatar', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
