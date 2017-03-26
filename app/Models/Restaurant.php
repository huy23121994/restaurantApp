<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Restaurant extends Model
{
     protected $fillable = [
        'name', 'description', 'location', 'workspace_id'
    ];

    public function employees()
    {
    	// $employees = Employee::distinct()->get();
    	return $this->belongsToMany(Employee::class, 'works');
    }
}
