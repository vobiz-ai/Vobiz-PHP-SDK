<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * One entry in a message's status history: a status the message reached and when.
 */
class MessageStatusEntry extends JsonSerializableType
{
    /**
     * @var ?value-of<MessageStatusEntryStatus> $status The status the message moved to: `scheduled`, `sent`, `delivered`, `failed`, `received` or `unknown`.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $errorCode Error code reported with this status. Omitted unless the entry records a failure.
     */
    #[JsonProperty('errorCode')]
    public ?string $errorCode;

    /**
     * @var ?string $errorMessage Human-readable failure reason reported with this status. Omitted unless the entry records a failure.
     */
    #[JsonProperty('errorMessage')]
    public ?string $errorMessage;

    /**
     * @var ?string $provider Internal routing identifier; do not rely on its value.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?DateTime $createdAt When the message reached this status (ISO 8601, UTC).
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   status?: ?value-of<MessageStatusEntryStatus>,
     *   errorCode?: ?string,
     *   errorMessage?: ?string,
     *   provider?: ?string,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->errorCode = $values['errorCode'] ?? null;
        $this->errorMessage = $values['errorMessage'] ?? null;
        $this->provider = $values['provider'] ?? null;
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
