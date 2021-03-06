<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\UrlObserver;
use App\Models\Url;

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
        Url::observe(UrlObserver::class);
    }
}
