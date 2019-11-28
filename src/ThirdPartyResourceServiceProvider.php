<?php

namespace ThirdPartyResource;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;

/**
 *
 */
class ThirdPartyResourceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerConfig();
        $this->registerCommands();
    }

    public function boot()
    {
    }

    // --------------------------------------------------------------------------------
    //  register
    // --------------------------------------------------------------------------------

    protected function registerConfig()
    {
        $this->mergeConfigFrom(dirname(__DIR__) . '/config/third-party-resource.php', 'third-party-resource');
    }

    protected function registerCommands()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        $this->commands([
            Console\Commands\TryCommand::class,
            Console\Commands\ApiAcceptanceTestCommand::class,
        ]);
    }

    // --------------------------------------------------------------------------------
    //  boot
    // --------------------------------------------------------------------------------


}
