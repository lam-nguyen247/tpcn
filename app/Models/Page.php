<?php

namespace App\Models;

use App\Models\Traits\SeoableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, SeoableTrait;

    protected $guarded = ['file', 'files'];
}
