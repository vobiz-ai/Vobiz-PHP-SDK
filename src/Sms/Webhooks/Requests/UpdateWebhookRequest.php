<?php

namespace Vobiz\Sms\Webhooks\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Sms\Types\WebhookEvent;
use Vobiz\Core\Types\ArrayType;

class UpdateWebhookRequest extends JsonSerializableType
{
    /**
     * @var ?string $url New HTTPS URL for deliveries. Replaces the current URL as sent, so always send a full valid URL.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $secret New signing secret for `X-Webhook-Signature`. Deliveries are signed with the new value from this point, so update your verifier at the same time.
     */
    #[JsonProperty('secret')]
    public ?string $secret;

    /**
     * @var ?array<value-of<WebhookEvent>> $events New list of event names to deliver, matched exactly. Replaces the whole list; it is not merged with the current events.
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public ?array $events;

    /**
     * @var ?bool $active `false` pauses deliveries and keeps the subscription; `true` resumes them.
     */
    #[JsonProperty('active')]
    public ?bool $active;

    /**
     * @param array{
     *   url?: ?string,
     *   secret?: ?string,
     *   events?: ?array<value-of<WebhookEvent>>,
     *   active?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->url = $values['url'] ?? null;
        $this->secret = $values['secret'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->active = $values['active'] ?? null;
    }
}
