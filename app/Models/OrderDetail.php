<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;
class OrderDetail extends Model
{
    protected $guarded = [];

    public function getProductAttribute(){
        $product = Product::where('id',$this->product_id)->first()->toArray();
        $product['price'] = $product['sale']>0?$product['sale'] :$product['price'] ;
        $product['property_name'] = '';
        if($this->product_property_id!=0){
            $property = ProductProperty::find($this->product_property_id)->first();
            $product['title'] = $property->value;
            $product['property_name'] = Str::limit($property->sub_value,21);
            $product['price'] = $property->sale>0?$property->sale:$property->price;
            $product['sale'] = $property->sale;
            $product['slug'] = $product['slug'] . "?index=" . $this->property_id;
        }
        return $product;
    }    
    public function getStoreAttribute(){
        return Store::find($this->store_id);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
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
