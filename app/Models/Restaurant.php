<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

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
    
    public function employees_working()
    {
    	return $this->belongsToMany(Employee::class, 'works')->wherePivot('status', 1);
    }
}
