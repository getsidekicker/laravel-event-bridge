<?php

namespace Sidekicker\EventBridge\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Spatie\WebhookClient\Models\WebhookCall as BaseWebhookCall;
use Spatie\WebhookClient\WebhookConfig;

class WebhookCall extends BaseWebhookCall
{
    use HasFactory;

    public static function storeWebhook(WebhookConfig $config, Request $request): WebhookCall
    {
        return self::create([
            'name' => $config->name,
            'event_id' => $request->input('id'),
            'payload' => $request->input(),
        ]);
    }
}
