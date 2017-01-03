<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'fullname', 'email', 'phone', 'birthday', 'avatar','gender'
    ];

    public static function get_all() {
        return self::all();
    }

    public function get_age() {
        $birthday =  Carbon::createFromFormat('d / m / Y', $this->birthday);
        return $birthday->age;
    }

    public function setBirthdayAttribute($date)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d/m/Y', $date);
    }
    public function getBirthdayAttribute($date)
    {
        $birthday = Carbon::parse($date);
        return $birthday->day . ' / ' . $birthday->month . ' / ' . $birthday->year;
    }
    public function getFullnameAttribute($value)
    {
        return ucfirst($value);
    }
}
