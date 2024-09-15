<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register any application services here.
        // For example, you might bind interfaces to implementations here.
        // $this->app->bind('SomeInterface', 'SomeImplementation');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Perform any necessary bootstrapping.
        
        // Example: Set a default string length for database columns.
        Schema::defaultStringLength(191);
        
        // Example: You can share data with all views here.
        // View::share('key', 'value');
        
        // Example: You can add other bootstrap logic if needed.
        // For example, setting up a global configuration.
    }
}
