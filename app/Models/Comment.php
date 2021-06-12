<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getStatusStringAttribute(){
        return $this->status==1?'Hiện':'Ẩn';
    }

    public function getColorAttribute(){
        switch($this->status){
            case 1: return 'red';
            case 0: return 'blue';
            default: return 'red';
        };
    }
}

