<?php

namespace Sidekicker\EventBridge;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Sidekicker\EventBridge\Commands\EventBridgeCommand;

class EventBridgeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-event-bridge')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-event-bridge_table')
            ->hasCommand(EventBridgeCommand::class);
    }
}
