<?php

namespace App\ViewComposers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Disease;
use App\Models\ProductCategory;
use Illuminate\View\View;

class HeaderComposers
{
    /**
     * Bind data to the view.
     * Bind data vào view
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $productCategory = ProductCategory::where('display_home', 1)->orderBy('order_display','asc')->get();
        $categoryPost = Category::where('master_category_id', 1)->orderBy('id','DESC')->get();
        $disease = Disease::where('display_home', 1)->get();
        $banner = Banner::all();

        $view->with([
            'productCategory' => $productCategory,
            'categoryPost' => $categoryPost,
            'disease' => $disease,
            'banner' => $banner
        ]);
    }
}
