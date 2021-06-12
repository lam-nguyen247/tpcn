<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ProductProperty extends Model
{
    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public static function decrementQty($id, $qty){
        ProductProperty::where('id', $id)->update([
            'qty' => DB::raw('qty-'.$qty)
        ]);
    }
}
