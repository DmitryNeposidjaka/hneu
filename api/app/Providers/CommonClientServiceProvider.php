<?php

namespace App\Providers;

use App\Services\CommonClient;
use Illuminate\Support\ServiceProvider;

class CommonClientServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('commonClient', function ($app) {
            return new CommonClient();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
