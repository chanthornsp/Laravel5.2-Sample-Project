<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LastArticleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar',function($view){
            $lastUpdate = \App\NewsData::where('active',1)
                ->orderBy('id','desc')
                ->take(5)
                ->get();
                $view->with('lastUpdate',$lastUpdate);
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
