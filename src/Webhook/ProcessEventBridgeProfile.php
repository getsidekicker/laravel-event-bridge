<?php

namespace Sidekicker\EventBridge\Webhook;


use Illuminate\Http\Request;
use Sidekicker\EventBridge\Models\WebhookCall;
use Spatie\WebhookClient\WebhookProfile\WebhookProfile;

class ProcessEventBridgeProfile implements WebhookProfile
{
    public function shouldProcess(Request $request): bool
    {
        $contents = $request->json();

        $matches = $contents->has('id')
            && $contents->has('detail-type')
            && $contents->has('detail')
            && data_get($contents->get('detail'), 'event.body');

        return $matches && !WebhookCall::query()
                ->where('event_id', '=', $contents->get('id'))
                ->exists();
    }
}
