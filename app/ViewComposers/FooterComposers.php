<?php

namespace App\ViewComposers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Disease;
use App\Models\Page;
use App\Models\ProductCategory;
use Illuminate\View\View;

class FooterComposers
{
    /**
     * Bind data to the view.
     * Bind data vào view
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $pageList = Page::whereNotIn('slug', config('constants.pageException'))->get();

        $view->with([
            'pageList' => $pageList
        ]);
    }
}
