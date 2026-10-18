<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * The latest outbound message sent from a number, for a quick health check. `null` when the number has not sent a message yet.
 */
class SmsNumberLastMessage extends JsonSerializableType
{
    /**
     * @var ?value-of<SmsNumberLastMessageStatus> $status Delivery status of that message: `scheduled`, `sent`, `delivered`, `failed`, `received` or `unknown`.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $errorCode Error code reported for the message. Empty string unless the message failed.
     */
    #[JsonProperty('errorCode')]
    public ?string $errorCode;

    /**
     * @var ?string $errorMessage Human-readable reason for the failure. Empty string unless the message failed.
     */
    #[JsonProperty('errorMessage')]
    public ?string $errorMessage;

    /**
     * @var ?string $to Recipient of that message in E.164 format.
     */
    #[JsonProperty('to')]
    public ?string $to;

    /**
     * @var ?DateTime $createdAt When that message was created (ISO 8601).
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   status?: ?value-of<SmsNumberLastMessageStatus>,
     *   errorCode?: ?string,
     *   errorMessage?: ?string,
     *   to?: ?string,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->errorCode = $values['errorCode'] ?? null;
        $this->errorMessage = $values['errorMessage'] ?? null;
        $this->to = $values['to'] ?? null;
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
