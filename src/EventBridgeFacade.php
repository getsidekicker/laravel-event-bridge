<?php

namespace Sidekicker\EventBridge;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sidekicker\EventBridge\EventBridge
 */
class EventBridgeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-event-bridge';
    }
}
