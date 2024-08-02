<?php

namespace App\Providers;

use App\classes\TestClass;
use Illuminate\Support\ServiceProvider;

class TestFascadeProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('test',function(){
            return new TestClass();
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
