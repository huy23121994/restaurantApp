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

    public function foods_active()
    {
        return $this->belongsToMany(Food::class)->wherePivot('status',1);
    }

    public static function addFoodToAll(Food $food)
    {
        $restaurants = getWorkspace()->restaurants;
        if($restaurants->count() == 0) return 1;
        
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

    public static function addAllFood(Restaurant $restaurant){
        $foods = getWorkspace()->foods;
        foreach ($foods as $food) {
            $result =  $restaurant->foods()->attach($food->id);
        }
    }
    
    public function employees_working()
    {
    	return $this->belongsToMany(Employee::class, 'works')->wherePivot('status', 1);
    }
}
