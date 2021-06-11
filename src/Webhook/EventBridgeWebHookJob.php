<?php

namespace Sidekicker\EventBridge\Webhook;

use Illuminate\Support\Facades\Log;
use Spatie\WebhookClient\ProcessWebhookJob;

class EventBridgeWebHookJob extends ProcessWebhookJob
{
    public function handle(): void
    {
        $payload = $this->webhookCall->payload;
        Log::info(static::class . ' > Caught Hook', $payload);

        $events = config('event-bridge.events');
        Log::info(static::class . ' > Available events', $events);

        $eventClass = $events[$payload['detail-type']] ?? null;
        if ($eventClass) {
            Log::info(static::class . ' > Dispatched to ' . $eventClass);
            event(new $eventClass($payload['detail']['event']['body']));
        } else {
            Log::info(static::class . ' > No matching event');
        }
    }
}
