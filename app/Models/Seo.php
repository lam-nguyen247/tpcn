<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'canonical', 'description', 'robots'];

    public const META_LIST = ['title', 'canonical', 'description', 'robots'];

    public function seoable()
    {
        return $this->morphTo();
    }
}
