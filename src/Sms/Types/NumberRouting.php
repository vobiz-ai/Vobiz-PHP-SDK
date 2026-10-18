<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * The routing record that connects a purchased number to your account for messaging.
 */
class NumberRouting extends JsonSerializableType
{
    /**
     * @var ?int $id Numeric identifier of the routing record.
     */
    #[JsonProperty('id')]
    public ?int $id;

    /**
     * @var ?string $e164 The routed number in E.164 format.
     */
    #[JsonProperty('e164')]
    public ?string $e164;

    /**
     * @var ?string $provider Internal routing identifier; do not rely on its value.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?array<string> $channelCapabilities Lower-case messaging channels routed on the number, for example `sms` and `mms`.
     */
    #[JsonProperty('channelCapabilities'), ArrayType(['string'])]
    public ?array $channelCapabilities;

    /**
     * @var ?string $accountId Auth ID of the account the number is routed to, for example `MA_XXXXXXXX`.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?string $countryCode ISO 3166-1 alpha-2 code of the number's country.
     */
    #[JsonProperty('countryCode')]
    public ?string $countryCode;

    /**
     * @var ?DateTime $createdAt When the number was routed to your account (ISO 8601).
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   id?: ?int,
     *   e164?: ?string,
     *   provider?: ?string,
     *   channelCapabilities?: ?array<string>,
     *   accountId?: ?string,
     *   countryCode?: ?string,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->e164 = $values['e164'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->channelCapabilities = $values['channelCapabilities'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->countryCode = $values['countryCode'] ?? null;
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
