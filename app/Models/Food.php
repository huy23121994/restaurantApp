<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public function workspace()
    {
    	return $this->belongsTo(Workspace::class);
    }

    public function restaurants()
    {
    	return $this->belongsToMany(Restaurant::class,'food_restaurant')->withPivot('status');
    }

    public function getFoodIdAttribute($value)
    {
        return ucfirst($value);
    }
}
