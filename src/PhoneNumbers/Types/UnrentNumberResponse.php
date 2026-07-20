<?php

namespace Vobiz\PhoneNumbers\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

class UnrentNumberResponse extends JsonSerializableType
{
    /**
     * @var string $cancelUrl
     */
    #[JsonProperty('cancel_url')]
    public string $cancelUrl;

    /**
     * @var DateTime $cooldownEndsAt
     */
    #[JsonProperty('cooldown_ends_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $cooldownEndsAt;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var ?string $note
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @var float $releaseFee
     */
    #[JsonProperty('release_fee')]
    public float $releaseFee;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @param array{
     *   cancelUrl: string,
     *   cooldownEndsAt: DateTime,
     *   message: string,
     *   releaseFee: float,
     *   status: string,
     *   note?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cancelUrl = $values['cancelUrl'];
        $this->cooldownEndsAt = $values['cooldownEndsAt'];
        $this->message = $values['message'];
        $this->note = $values['note'] ?? null;
        $this->releaseFee = $values['releaseFee'];
        $this->status = $values['status'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
