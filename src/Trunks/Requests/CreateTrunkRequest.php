<?php

namespace Vobiz\Trunks\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Trunks\Types\CreateTrunkRequestWebhookMethod;

class CreateTrunkRequest extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $trunkType
     */
    #[JsonProperty('trunk_type')]
    public string $trunkType;

    /**
     * @var int $maxConcurrentCalls
     */
    #[JsonProperty('max_concurrent_calls')]
    public int $maxConcurrentCalls;

    /**
     * HTTPS URL to receive real-time call-event webhooks (`CallInitiated`
     * and `Hangup`) for this trunk. Max 500 characters; private, localhost,
     * and cloud-metadata IPs are blocked. See [Trunk Webhooks](/trunks/webhook).
     *
     * @var ?string $webhookUrl
     */
    #[JsonProperty('webhook_url')]
    public ?string $webhookUrl;

    /**
     * @var ?value-of<CreateTrunkRequestWebhookMethod> $webhookMethod HTTP method for the webhook callback. Defaults to `POST`.
     */
    #[JsonProperty('webhook_method')]
    public ?string $webhookMethod;

    /**
     * @param array{
     *   name: string,
     *   trunkType: string,
     *   maxConcurrentCalls: int,
     *   webhookUrl?: ?string,
     *   webhookMethod?: ?value-of<CreateTrunkRequestWebhookMethod>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->trunkType = $values['trunkType'];
        $this->maxConcurrentCalls = $values['maxConcurrentCalls'];
        $this->webhookUrl = $values['webhookUrl'] ?? null;
        $this->webhookMethod = $values['webhookMethod'] ?? null;
    }
}
