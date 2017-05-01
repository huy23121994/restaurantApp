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
    	return $this->belongsToMany(Restaurant::class,'food_restaurant')->withPivot('number');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_food');
    }

    public function getFoodIdAttribute($value)
    {
        return ucfirst($value);
    }
}
