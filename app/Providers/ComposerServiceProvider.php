<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer([
            'home.includes.header',
            'home.sidebar.filter',
            'home.sidebar.category',
            'home.sidebar.category-post',
            'home.post.index',
        ], 'App\ViewComposers\HeaderComposers');
    }
}
