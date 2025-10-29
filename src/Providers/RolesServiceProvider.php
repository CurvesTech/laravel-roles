<?php

namespace Curvestech\LaravelRoles\Providers;
use Illuminate\Support\ServiceProvider;
use Curvestech\LaravelRoles\Commands\InstallRolesCommand;

class RolesServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ( $this->app->runningInConsole() ) {
            $this->commands([
                InstallRolesCommand::class,
            ]);
        }
    }
}

