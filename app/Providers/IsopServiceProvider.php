<?php

namespace App\Providers;

use App\isop\isop;
use Illuminate\Support\ServiceProvider;

class IsopServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('isop',function(){
            return new isop();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
