<?php

namespace Vobiz\Sms\Webhooks\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Sms\Types\WebhookEvent;
use Vobiz\Core\Types\ArrayType;

class CreateWebhookRequest extends JsonSerializableType
{
    /**
     * @var string $url The HTTPS URL that receives `POST` deliveries, for example `https://example.com/vobiz/webhooks`. Required; an empty or missing value returns `400` with `url is required`.
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?string $secret Shared secret used to compute `X-Webhook-Signature` on every delivery. Choose a long random value and store it on your server; if you omit it the subscription is created with an empty secret.
     */
    #[JsonProperty('secret')]
    public ?string $secret;

    /**
     * @var ?array<value-of<WebhookEvent>> $events Event names to deliver to this URL, matched exactly. Defaults to `message.received`, `message.delivered` and `message.failed` when you omit it or send an empty array.
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public ?array $events;

    /**
     * @param array{
     *   url: string,
     *   secret?: ?string,
     *   events?: ?array<value-of<WebhookEvent>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->secret = $values['secret'] ?? null;
        $this->events = $values['events'] ?? null;
    }
}
