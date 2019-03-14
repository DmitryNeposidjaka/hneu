<?php

namespace App\Providers;

use App\Services\MoodleClient;
use Illuminate\Support\ServiceProvider;

class MoodleClientServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('moodleClient', function ($app) {
            return new MoodleClient();
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
