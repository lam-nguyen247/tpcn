<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * $masterCategory->categoryList
     *
     * @return HasMany
     */
    public function categoryList()
    {
        return $this->hasMany(Category::class)->where('language', app()->getLocale());
    }

    public function rootCategoryList()
    {
        return $this->hasMany(Category::class)->whereNull('category_id')->where('language', app()->getLocale());
    }
}
