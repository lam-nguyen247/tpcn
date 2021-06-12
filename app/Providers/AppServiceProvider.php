<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Cms;
use App\Models\Configuration;
use App\Models\Customer;
use App\Models\Page;
use App\Models\Post;
use App\Models\Slide;
use App\Observers\CategoryObserver;
use App\Observers\CmsObserver;
use App\Observers\ConfigurationObserver;
use App\Observers\CustomerObserver;
use App\Observers\PageObserver;
use App\Observers\PostObserver;
use App\Observers\SlideObserver;
use App\View\Components\ActionComponent;
use App\View\Components\DropifyComponent;
use App\View\Components\InputComponent;
use App\View\Components\SelectComponent;
use App\View\Components\SummernoteComponent;
use App\View\Components\TextareaComponent;
use Exception;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Blade::include('home.includes.src', 'src');
        Blade::include('home.includes.load', 'load');
        Blade::include('home.includes.scroll', 'scroll');
        Blade::include('home.includes.cms', 'cms');
        Blade::include('admin.seo.create', 'createseo');
        Blade::include('admin.seo.edit', 'editseo');
        Blade::component('input', InputComponent::class);
        Blade::component('select', SelectComponent::class);
        Blade::component('textarea', TextareaComponent::class);
        Blade::component('summernote', SummernoteComponent::class);
        Blade::component('dropify', DropifyComponent::class);
        Blade::component('action', ActionComponent::class);

        Cms::observe(CmsObserver::class);
        Customer::observe(CustomerObserver::class);
        Category::observe(CategoryObserver::class);
        Post::observe(PostObserver::class);
        Page::observe(PageObserver::class);
        Slide::observe(SlideObserver::class);
        Configuration::observe(ConfigurationObserver::class);

        View::share('domain', Str::slug(request()->getHost()));
        if(empty(session('theme'))){
            Session::put('theme', 'light');
        }
        try {
            if (Cache::has('config')) {
                $config = Cache::get('config');
            } else {
                $config = (object)Configuration::all()->pluck('content', 'name')->toArray();
                Cache::put('config', $config);
            }
            View::share('config', $config);
        } catch (Exception $e) {
            // NOP
        }
    }
}
