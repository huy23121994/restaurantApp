<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'fullname', 'email', 'password', 'phone', 'address'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function workspaces()
    {
        return $this->hasMany(Workspace::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getFullnameAttribute($value)
    {
        return ucfirst($value);
    }
}
