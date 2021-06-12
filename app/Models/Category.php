<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['type'];

    /**
     * Call $category->parent
     *
     * @return BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Call $category->parentList
     *
     * @return BelongsTo
     */
    public function parentList()
    {
        return $this->belongsTo(Category::class, 'category_id')->with('parent');
    }

    /**
     * Call Category::whereNull('category_id')->with('child')->get()
     *
     * @return HasMany
     */
    public function child()
    {
        return $this->hasMany(Category::class);
    }

    /**
     * Call Category::whereNull('category_id')->with('childList')->get()
     *
     * @return HasMany
     */
    public function childList()
    {
        return $this->hasMany(Category::class)->with('childList');
    }

    /**
     * Call Category::has('postList')->get() Get all category list has post
     *
     * @return MorphToMany
     */
    public function postList()
    {
        return $this->morphedByMany(Post::class, 'categoryable');
    }

    /**
     * $category->masterCategory
     *
     * @return BelongsTo
     */
    public function masterCategory()
    {
        return $this->belongsTo(MasterCategory::class);
    }

    public function getHrefAttribute()
    {
        return config('constants.url.category') . $this->slug;
    }
}
