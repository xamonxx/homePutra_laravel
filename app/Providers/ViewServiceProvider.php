<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     * Share settings with ALL views automatically.
     */
    public function boot(): void
    {
        // Share settings globally across ALL views
        View::composer('*', function ($view) {
            // Only fetch if not already present
            if (!isset($view->getData()['settings'])) {
                $view->with('settings', SiteSetting::getAllAsArray());
            }
        });
    }
}
