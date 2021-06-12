<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cms extends Model
{
    protected $fillable = ['name', 'content'];

    public function getExcerptAttribute()
    {
        return Str::limit($this->content);
    }

    public function getSrcAttribute()
    {
        return $this->content;
    }
}
