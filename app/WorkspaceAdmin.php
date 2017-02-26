<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkspaceAdmin extends Model
{
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = encrypt($value);
    }

    public function getPasswordAttribute($value)
    {
        return decrypt($value);
    }
}
