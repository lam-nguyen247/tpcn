<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Configuration;
class Order extends Model
{
    protected $guarded = [];

    protected $appends = ['color'];

    public function listDetail(){
        return $this->hasMany(OrderDetail::class);
    }

    public function addressShipping(){
        return $this->hasOne(AddressPaypal::class);
    }

    public function getPaymentStringAttribute(){
        return $this->payment==1?'Đã thanh toán':'Chưa thanh toán';
    }

    public function getStatusStringAttribute(){
        switch($this->status){
            case 1: return 'Mới';
            case 2: return 'Đang giao hàng';
            case 3: return 'Đã giao hàng';
            case 4: return 'Hủy bỏ';
            case 5: return 'Hoàn trả';
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
            default: return 'red';
        };
    }
    public function getUudaiAttribute(){
        $configuration = Configuration::all()->pluck('value', 'key');
        if($this->method == 'Trực tiếp'){
            return $configuration['offline'];
        }else{
            return $configuration['online'];
        }
    }
}
