<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Food;

class Restaurant extends Model
{
     protected $fillable = [
        'name', 'description', 'location', 'workspace_id'
    ];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }

    public function employees()
    {
    	return $this->belongsToMany(Employee::class, 'works');
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class)->withPivot('status');
    }

    public static function addFoodToAll(Food $food)
    {
        $restaurants = getWorkspace()->restaurants;
        if($restaurants->count() == 0) return 0;
        
        foreach ($restaurants as $restaurant) {
            $result = \DB::table('food_restaurant')->insert([
                'food_id' => $food->id,
                'restaurant_id' => $restaurant->id,
                'status' => 1
            ]);
            if(!$result){ break; }
        }
        return $result;
    }
    
    public function employees_working()
    {
    	return $this->belongsToMany(Employee::class, 'works')->wherePivot('status', 1);
    }
}
