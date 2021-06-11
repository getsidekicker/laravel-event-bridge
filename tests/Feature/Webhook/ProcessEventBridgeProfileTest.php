<?php

namespace Sidekicker\EventBridge\Tests\Feature\Webhook;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Sidekicker\EventBridge\Models\WebhookCall;
use Sidekicker\EventBridge\Tests\TestCase;
use Sidekicker\EventBridge\Webhook\EventBridgeDetailValidator;
use Sidekicker\EventBridge\Webhook\ProcessEventBridgeProfile;

class ProcessEventBridgeProfileTest extends TestCase
{
    public function testWebhookCaught(): void
    {
        config()->set('webhook-client.configs.0.signing_secret', 'hVmYq3t6v9y$B&E)');

        $eventBody = [
            'body' => ['key' => 'value']
        ];

        $detail = [
            'signature' => EventBridgeDetailValidator::generateSignature($eventBody, config('webhook-client.configs.0.signing_secret')),
            'event' => $eventBody
        ];

        $this->postJson('/webhooks/event-bridge', [
            'id' => Str::uuid()->toString(),
            'detail-type' => 'test',
            'detail' => $detail
        ])->assertOk();
    }

    public function testMissingProperties(): void
    {
        $webhook = WebhookCall::factory()->create();
        $request = Request::create('/webhooks/event-bridge');
        $request->json()->set('id', Str::uuid()->toString());
        $request->json()->set('detail-type', $webhook->name);

        $this->assertFalse((new ProcessEventBridgeProfile())->shouldProcess($request));
    }


    public function testDuplicateEvent(): void
    {
        $webhook = WebhookCall::factory()->create();
        $request = Request::create('/webhooks/event-bridge');
        $request->json()->set('id', $webhook->event_id);
        $request->json()->set('detail-type', $webhook->name);
        $request->json()->set('detail', ['event'=>['body'=>[]]]);

        $this->assertFalse((new ProcessEventBridgeProfile())->shouldProcess($request));
    }
}
