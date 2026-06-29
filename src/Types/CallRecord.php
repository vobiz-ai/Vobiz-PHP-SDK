<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

class CallRecord extends JsonSerializableType
{
    /**
     * @var ?string $callUuid
     */
    #[JsonProperty('call_uuid')]
    public ?string $callUuid;

    /**
     * @var ?string $fromNumber
     */
    #[JsonProperty('from_number')]
    public ?string $fromNumber;

    /**
     * @var ?string $toNumber
     */
    #[JsonProperty('to_number')]
    public ?string $toNumber;

    /**
     * @var ?value-of<CallRecordCallStatus> $callStatus
     */
    #[JsonProperty('call_status')]
    public ?string $callStatus;

    /**
     * @var ?int $duration
     */
    #[JsonProperty('duration')]
    public ?int $duration;

    /**
     * @var ?int $billDuration
     */
    #[JsonProperty('bill_duration')]
    public ?int $billDuration;

    /**
     * @var ?string $billedAmount
     */
    #[JsonProperty('billed_amount')]
    public ?string $billedAmount;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   callUuid?: ?string,
     *   fromNumber?: ?string,
     *   toNumber?: ?string,
     *   callStatus?: ?value-of<CallRecordCallStatus>,
     *   duration?: ?int,
     *   billDuration?: ?int,
     *   billedAmount?: ?string,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->callUuid = $values['callUuid'] ?? null;
        $this->fromNumber = $values['fromNumber'] ?? null;
        $this->toNumber = $values['toNumber'] ?? null;
        $this->callStatus = $values['callStatus'] ?? null;
        $this->duration = $values['duration'] ?? null;
        $this->billDuration = $values['billDuration'] ?? null;
        $this->billedAmount = $values['billedAmount'] ?? null;
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
