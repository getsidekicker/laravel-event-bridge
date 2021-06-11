<?php

namespace Sidekicker\EventBridge\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Sidekicker\EventBridge\EventBridgeServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Sidekicker\\EventBridge\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            EventBridgeServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        include_once __DIR__.'/../database/migrations/create_webhook_calls_table.php.stub';
        (new \CreateWebhookCallsTable())->up();
    }
}
