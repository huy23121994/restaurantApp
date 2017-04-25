<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkspaceAdmin extends Model
{
    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function restaurantAdmin()
    {
        if ($this->role_id == 1) {
            return 1;
        }
        return 0;
    }

    public function globalAdmin()
    {
        if ($this->role_id == 2) {
            return 1;
        }
        return 0;
    }

    public function role()
    {
    	return $this->belongsTo(RestaurantRole::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = encrypt($value);
    }

    public function getPasswordAttribute($value)
    {
        return decrypt($value);
    }

    public function setRestaurantIdAttribute($value)
    {
        if ($value) {
            $this->attributes['restaurant_id'] = $value;
        }else{
            $this->attributes['restaurant_id'] = 0;
        }
    }

    public function setRoleIdAttribute($value)
    {
        if ($value) {
            $this->attributes['role_id'] = $value;
        }else{
            $this->attributes['role_id'] = 3;
        }
    }

}
