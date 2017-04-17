<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
        'order_id', 'customer', 'address', 'description'
    ];

    public function workspace()
    {
    	return $this->belongsTo(Workspace::class);
    }

    public function foods()
    {
    	return $this->belongsToMany(Food::class, 'order_food')->withPivot('number');
    }
}
