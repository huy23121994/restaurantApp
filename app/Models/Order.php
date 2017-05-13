<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /*
    *   status :    0 => Da gui yeu cau, Chua xu ly
    *               1 => Da nhan yeu cau, dang xu ly
    *               2 => Da xu ly
    *               3 => Da nhan yeu cau nhung don hang bi huy
    *               4 => Huy yeu cau
    */
	protected $fillable = [
        'order_id', 'customer', 'address', 'description', 'restaurant_id', 'status', 'admin_id'
    ];

    public function workspace()
    {
    	return $this->belongsTo(Workspace::class);
    }

    public function foods()
    {
    	return $this->belongsToMany(Food::class, 'order_food')->withPivot('number');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function getStatusAttribute($value)
    {
        switch ($value) {
            case 0:
                $result = [ 'status' => 'Chưa xử lý', 'value' => 0, 'class' => 'btn-info'];
                break;
            case 1:
                $result = [ 'status' => 'Đang xử lý', 'value' => 1, 'class' => 'btn-warning'];
                break;
            case 2:
                $result = [ 'status' => 'Đã xử lý', 'value' => 2, 'class' => 'btn-success'];
                break;
            case 3:
                $result = [ 'status' => 'Đơn hàng bị hủy', 'value' => 3, 'class' => 'btn-danger'];
                break;
            case 4:
                $result = [ 'status' => 'Hủy yêu cầu', 'value' => 4, 'class' => 'btn-danger'];
                break;
        }
        return $result;
    }

    public function setAddressAttribute($address)
    {
        $this->attributes['address'] = json_encode($address);
    }

    public function getAddressAttribute($address)
    {
        return json_decode($address,true);
    }
}
