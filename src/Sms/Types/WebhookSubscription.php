<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * A webhook subscription: the URL Vobiz delivers your chosen events to, and the secret used to sign them.
 */
class WebhookSubscription extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier of the subscription (UUID). Use it with `GET`, `PUT` and `DELETE /webhooks/{id}`.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $accountId Auth ID of the account that owns the subscription, for example `MA_XXXXXXXX`.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?string $url The URL that receives `POST` deliveries.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $secret The signing secret for `X-Webhook-Signature`, returned in clear. Keep it out of logs and client-side code.
     */
    #[JsonProperty('secret')]
    public ?string $secret;

    /**
     * @var ?array<value-of<WebhookEvent>> $events Event names delivered to this URL. An event is delivered only when its name appears here exactly.
     */
    #[JsonProperty('events'), ArrayType(['string'])]
    public ?array $events;

    /**
     * @var ?bool $active `true` when deliveries are on. New subscriptions start `true`; set it with `PUT /webhooks/{id}`.
     */
    #[JsonProperty('active')]
    public ?bool $active;

    /**
     * @var ?DateTime $createdAt When the subscription was created (ISO 8601). Read it from `GET /webhooks/{id}` or `GET /webhooks`.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   id?: ?string,
     *   accountId?: ?string,
     *   url?: ?string,
     *   secret?: ?string,
     *   events?: ?array<value-of<WebhookEvent>>,
     *   active?: ?bool,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->secret = $values['secret'] ?? null;
        $this->events = $values['events'] ?? null;
        $this->active = $values['active'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
