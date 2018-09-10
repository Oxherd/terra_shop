<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('partials.header', function ($view) {
            $view->with('categories', \App\Category::all());
        });

        view()->composer('partials.tags', function ($view) {
            $view->with('tags', \App\Tag::all());
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
