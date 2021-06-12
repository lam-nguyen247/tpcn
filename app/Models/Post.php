<?php

namespace App\Models;

use App\Models\Traits\SeoableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SeoableTrait;

    protected $guarded = ['file', 'files', 'category_id'];

    public function category()
    {
        return $this->morphToMany(Category::class, 'categoryable');
    }

    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags(html_entity_decode($this->content)));
    }

    public function getHrefAttribute()
    {
        return '/' . trans('news') . '/' . $this->slug;
    }

    public function getPublishedAtAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }
}
