<?php

namespace Sidekicker\EventBridge\Webhook;

use Illuminate\Http\Request;
use JsonException;
use Spatie\WebhookClient\Exceptions\WebhookFailed;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class EventBridgeDetailValidator implements SignatureValidator
{
    /**
     * @throws WebhookFailed
     */
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        $signature = $request->header(
            $config->signatureHeaderName,
            $request->json('detail.signature')
        );

        if (!$signature || is_array($signature)) {
            return false;
        }

        $signingSecret = $config->signingSecret;

        if (empty($signingSecret)) {
            throw WebhookFailed::signingSecretNotSet();
        }

        try {
            $computedSignature = static::generateSignature(
                $request->json('detail.event'),
                $config->signingSecret
            );
        } catch (JsonException $e) {
            throw WebhookFailed::invalidSignature();
        }

        return hash_equals($signature, $computedSignature);
    }

    /**
     * @param array<string, mixed> $detail
     *
     * @throws JsonException
     */
    public static function generateSignature(array $detail, string $signingSecret): string
    {
        return hash_hmac(
            'sha256',
            json_encode($detail, JSON_THROW_ON_ERROR),
            $signingSecret
        );
    }
}
