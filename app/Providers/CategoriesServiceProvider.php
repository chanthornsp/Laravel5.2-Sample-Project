<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.nav',function($view){
            $categories = \App\Category::where('active',1)
                            ->orderBy('name','desc')->get();
            $view->with('categories',$categories);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
