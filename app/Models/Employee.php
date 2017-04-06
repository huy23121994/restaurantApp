<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'fullname', 'email', 'phone', 'birthday', 'avatar','gender', 'address'
    ];

    public static function get_all_from_workspace() {
        return getWorkspace()->employees;
    }

    public function works()
    {
        return $this->hasMany(Work::class);
    }

    public function work_active()
    {
        return $this->hasOne(Work::class)->where('status',1);
    }

    public function get_age() {
        $birthday =  Carbon::createFromFormat('d/m/Y', $this->birthday);
        return $birthday->age;
    }

    public function setBirthdayAttribute($date)
    {
        if ($date != '') {
            $this->attributes['birthday'] = Carbon::createFromFormat('d/m/Y', $date);
        }
    }
    public function getBirthdayAttribute($date)
    {
        $birthday = Carbon::parse($date);
        return $birthday->day . '/' . $birthday->month . '/' . $birthday->year;
    }
    public function getFullnameAttribute($value)
    {
        return ucfirst($value);
    }
    public function getGenderAttribute($value)
    {
        if ($value == 1) {
            return 'Nam';
        }
        return 'Nữ';
    }
}
