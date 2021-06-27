<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\Product;

class ProductCategory extends Model
{
    protected $guarded = [];

    public function productList()
    {
        return $this->hasMany(Product::class)->where('products.status', '1');
    }

    public function productListLasted(){
        return $this->hasMany(Product::class)->where('products.status', '1')->orderBy('products.id','desc');
    }

    public function productListSale(){
        return $this->hasMany(Product::class)->where('products.status', '1')->orderBy('products.purchase','desc');
    }

    public function question()
    {
        return $this->hasMany(QuestionAnswer::class);
    }

    public function getSlugAttribute($slug)
    {
        return  $slug;
    }

    public static function incrementOrder($parent_id=0){
        return DB::statement("UPDATE product_categories SET order_display = (order_display+1) WHERE parent_id=$parent_id ");
     }

     public static function decrementOrder($order_display,$parent_id=0){
        return DB::statement("UPDATE product_categories SET order_display = (order_display-1) where order_display > $order_display and parent_id=$parent_id");
      }

     public static function updateOrder($data){
         foreach($data as $key=>$value){
             DB::statement("UPDATE product_categories SET order_display = $key+1 where id = $value ");
         }
         return true;
     }

    public function products($store_id){
        $in[] = $this->id;
        $childs = ProductCategory::select('id')->where('parent_id', $this->id)->get();
        foreach ( $childs as $child){
                $in[] = $child->id;
        }
        return Product::whereIn('product_category_id', $in)->where('store_id',$store_id)->where('status', '1')->limit(8)->get();
    }

    public function productsByCate(){
        $in[] = $this->id;
        $childs = ProductCategory::select('id')->where('parent_id', $this->id)->get();
        foreach ( $childs as $child){
                $in[] = $child->id;
        }
        return Product::whereIn('product_category_id', $in)->where('status', '1')->limit(3)->get();
    }
}
