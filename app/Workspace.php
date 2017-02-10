<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $fillable = [
        'name', 'description','url', 'avatar', 'user_id'
    ];
    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = str_slug($value);
    }
}
