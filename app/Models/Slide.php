<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $guarded = ['file', 'files'];

    public function getSrcAttribute()
    {
        return $this->image;
    }
}
