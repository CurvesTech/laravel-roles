<?php

namespace Curvestech\LaravelRoles\Providers;
use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ( $this->app->runningInConsole() ) {
            $this->commands([
                \Curvestech\LaravelRoles\Commands\InstallRolesCommand::class,
            ]);
        }
    }
}

