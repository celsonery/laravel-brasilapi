<?php

namespace CelsoNery\BrasilApi\Providers;

use CelsoNery\BrasilApi\BrasilApiService;
use CelsoNery\BrasilApi\Console\InstallCommand;
use Illuminate\Support\ServiceProvider;

class BrasilApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/brasilapi.php',
            'brasilapi'
        );

        $this->app->singleton('brasilapi', function ($app) {
            return new BrasilApiService;
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/brasilapi.php' => config_path('brasilapi.php'),
        ], 'brasilapi-config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
