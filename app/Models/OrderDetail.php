<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;
class OrderDetail extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getStatusStringAttribute(){
        switch($this->status){
            case 1: return 'Mới';
            case 2: return 'Đang giao hàng';
            case 3: return 'Đã giao hàng';
            case 4: return 'Hủy bỏ';
            case 5: return 'Hoàn trả';
            case 5: return 'Hết hàng';
            default: return 'Mới';
        };
    }

    public function getColorAttribute(){
        switch($this->status){
            case 1: return 'red';
            case 2: return 'blue';
            case 3: return 'green';
            case 4: return 'pink';
            case 5: return 'purple';
            case 5: return 'orange';
            default: return 'red';
        };
    }
}
