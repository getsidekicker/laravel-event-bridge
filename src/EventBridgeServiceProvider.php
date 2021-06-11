<?php

namespace Sidekicker\EventBridge;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\WebhookClient\WebhookClientServiceProvider;

class EventBridgeServiceProvider extends PackageServiceProvider
{
    public function register(): void
    {
        parent::register();

        $this->app->register(WebhookClientServiceProvider::class);
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-event-bridge')
            ->hasConfigFile(['event-bridge', 'webhook-client'])
            ->hasMigration('create_webhook_calls_table')
            ->hasRoute('webhook');
    }
}
