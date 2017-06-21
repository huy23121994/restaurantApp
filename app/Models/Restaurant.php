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

    public function workspace(){
        return $this->belongsTo(Workspace::class);
    }

    public function employees(){
    	return $this->belongsToMany(Employee::class, 'works');
    }
    
    public function admin(){
    	return $this->hasOne(WorkspaceAdmin::class);
    }

    public function foods(){
        return $this->belongsToMany(Food::class)->withPivot('number');
    }

    public function foods_active(){
        return $this->belongsToMany(Food::class)->wherePivot('number','>', 0)->withPivot('number');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public static function addFoodToAll(Food $food, $number = 0){
        $restaurants = getWorkspace()->restaurants;
        if($restaurants->count() == 0) {
            return 1;
            
        }
        foreach ($restaurants as $restaurant) {
            $result = \DB::table('food_restaurant')->insert([
                'food_id' => $food->id,
                'restaurant_id' => $restaurant->id,
                'number' => $number
            ]);
            if(!$result){ 
                break; 
            }
        }
        return $result;
    }

    public static function addAllFood(Restaurant $restaurant){
        $foods = getWorkspace()->foods;
        foreach ($foods as $food) {
            $result =  $restaurant->foods()->attach($food->id);
        }
    }
    
    public function updateFoodNumber($order){
        $res_food = $this->foods;
        foreach ($order->foods as $food) {
            $order_number = $food->pivot->number;
            $current_number = $res_food->where('id',$food->id)->first()->pivot->number;
            if ($current_number > $order_number) {
                $update_number = $current_number - $order_number;
                $food->restaurants()->updateExistingPivot($this->id, ['number' => $update_number]);
            }
        }
    }
    
    public function employees_working(){
    	return $this->belongsToMany(Employee::class, 'works')->wherePivot('status', 1);
    }

    public function setLocationAttribute($location){
        $this->attributes['location'] = json_encode($location);
    }

    public function getLocationAttribute($location){
        return json_decode($location,true);
    }
}
