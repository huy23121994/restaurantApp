<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
     protected $fillable = [
        'name', 'description', 'location', 'workspace_id'
    ];

    public function employees()
    {
    	return $this->hasMany(Employee::class);
    }
}
