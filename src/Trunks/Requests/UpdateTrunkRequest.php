<?php

namespace Vobiz\Trunks\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Trunks\Types\UpdateTrunkRequestWebhookMethod;

class UpdateTrunkRequest extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $maxConcurrentCalls
     */
    #[JsonProperty('max_concurrent_calls')]
    public int $maxConcurrentCalls;

    /**
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var ?string $webhookUrl HTTPS URL for real-time call-event webhooks (`CallInitiated`, `Hangup`). See [Trunk Webhooks](/trunks/webhook).
     */
    #[JsonProperty('webhook_url')]
    public ?string $webhookUrl;

    /**
     * @var ?value-of<UpdateTrunkRequestWebhookMethod> $webhookMethod HTTP method for the webhook callback. Defaults to `POST`.
     */
    #[JsonProperty('webhook_method')]
    public ?string $webhookMethod;

    /**
     * @param array{
     *   name: string,
     *   maxConcurrentCalls: int,
     *   enabled: bool,
     *   webhookUrl?: ?string,
     *   webhookMethod?: ?value-of<UpdateTrunkRequestWebhookMethod>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->maxConcurrentCalls = $values['maxConcurrentCalls'];
        $this->enabled = $values['enabled'];
        $this->webhookUrl = $values['webhookUrl'] ?? null;
        $this->webhookMethod = $values['webhookMethod'] ?? null;
    }
}
