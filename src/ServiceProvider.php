<?php

namespace Cms18\CmsX;

use Illuminate\Support\ServiceProvider as SP;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Schema;

class ServiceProvider extends SP
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        Schema::defaultStringLength(191);
        $this->mergeConfigFrom(
            __DIR__.'/config/cmsx.php', 'cmsx'
        );
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views', 'cmsx');
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
