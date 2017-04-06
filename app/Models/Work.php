<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Work extends Model
{
	public function restaurant()
	{
		return $this->belongsTo(Restaurant::class);
	}

    public function setStartDateAttribute($date)
    {
        if ($date != '') {
            $this->attributes['start_date'] = Carbon::createFromFormat('d/m/Y', $date);
        }
    }

    public function setEndDateAttribute($date)
    {
        if ($date != '') {
            $this->attributes['end_date'] = Carbon::createFromFormat('d/m/Y', $date);
        }else{
            $this->attributes['end_date'] = NULL;
        }
    }

    public function getStartDateAttribute($date)
    {
        if ($date != NULL) {
            $start_date = Carbon::parse($date);
            return $start_date->day . '/' . $start_date->month . '/' . $start_date->year;
        }
    }

    public function getEndDateAttribute($date)
    {
        if ($date != NULL) {
            $end_date = Carbon::parse($date);
            return $end_date->day . '/' . $end_date->month . '/' . $end_date->year;
        }
    }
}
