<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'fullname', 'email', 'phone', 'birthday', 'date_start'
    ];

    public static function get_all() {
    	return self::all();
    }

    public function setBirthdayAttribute($date)
    {
        $this->attributes['birthday'] = Carbon::createFromDate(2016, 1, 1, 'Asia/Ho_Chi_Minh');
    }
}
