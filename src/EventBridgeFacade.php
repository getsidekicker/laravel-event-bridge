<?php

namespace Getsidekicker\EventBridge;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Getsidekicker\EventBridge\EventBridge
 */
class EventBridgeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-event-bridge';
    }
}
