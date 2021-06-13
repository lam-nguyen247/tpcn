<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;
use App\Models\Store;
use App\Models\Property;
use App\Models\Commnent;

class Product extends Model
{
    protected $guarded = [];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->where('comments.status', '1');;
    }

    public function commentList()
    {
        return $this->hasMany(Comment::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function productTogethers()
    {
        return $this->hasMany(ProductTogether::class);
    }

    public function getSrcAttribute()
    {
        return '/' . $this->image;

    }
    public function getLimitContentAttribute()
    {
        return Str::limit(strip_tags(html_entity_decode($this->content)), 200, '');
    }

    public function getSlugAttribute($slug)
    {
        $property = Property::where('product_id',$this->id)->first();
        if($property != null){
            if(count($property->productProperties)>0){
                return '/san-pham/' . $slug. '?index='.$property->productProperties[0]->id;
            }
        }
        return '/san-pham/' . $slug;
    }
    

    public function getPricevnAttribute(){
        if($this->price != null && $this->price > 0){
            return number_format($this->price,0,".",",");
        }
        return "Contact";
    }

    public function getPriceSaleAttribute(){
        if($this->sale != null && $this->sale > 0){
            return number_format($this->sale,0,".",",");
        }
        return "";
    }

    public function getPriceStringAttribute(){
        if($this->price != null && $this->price > 0){
            return number_format($this->price,0,".",",");
        }
        return "Contact";
    }

    public function getListImageAttribute(){
        return json_decode($this->album);
    }

    public function getOtherProductAttribute(){
        return Product::where('product_category_id',$this->product_category_id)->where('id','<>',$this->id)->limit(8)->get();
    }

    public static function incrementPurchase($id){
        Product::where('id', $id)->update([
            'purchase' => DB::raw('purchase+1')
        ]);
    }

    public static function decrementQty($id, $qty){
        Product::where('id', $id)->update([
            'qty' => DB::raw('qty - '.$qty)
        ]);
    }

    public static function incrementQty($id, $qty){
        Product::where('id', $id)->update([
            'qty' => DB::raw('qty + '.$qty)
        ]);
    }

    public function getStatusStringAttribute(){
        return $this->status==1?'Hiển thị':'Ẩn';
    }

    public function getNavAttribute(){
        $cat = ProductCategory::find(['id'=>$this->product_category_id])->first();
        if($cat->parent_id>0){
            $parent = ProductCategory::where('id', $cat->parent_id)->first();
            if($parent!= null)
                return "<a href='/san-pham?pid={$parent->id}'>{$parent->name}</a> <span class='divider'>/</span><a href='/san-pham?cid={$cat->id}'>{$cat->name}</a>";
            else
                return '';
        }else{
            return "<a href='/san-pham?cid={$cat->id}'>{$cat->name}</a>";
        }
    }
}
