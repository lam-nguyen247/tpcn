<?php

namespace App\Services;

use App\Models\Category;
use App\Models\MasterCategory;
use App\Models\Post;
use App\Models\Seo;
use Illuminate\Support\Str;

class CategoryService
{
    /**
     * @var ImageService
     */
    private $imageService;

    /**
     * @var SeoService
     */
    private $seoService;

    public function __construct(ImageService $imageService, SeoService $seoService)
    {
        $this->imageService = $imageService;
        $this->seoService = $seoService;
    }
}
