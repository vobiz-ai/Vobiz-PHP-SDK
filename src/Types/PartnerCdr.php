<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * Call detail record for a single voice session under a partner customer account.
 */
class PartnerCdr extends JsonSerializableType
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
     * @var ?value-of<PartnerCdrDirection> $direction
     */
    #[JsonProperty('direction')]
    public ?string $direction;

    /**
     * @var ?value-of<PartnerCdrStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?int $durationSeconds
     */
    #[JsonProperty('duration_seconds')]
    public ?int $durationSeconds;

    /**
     * @var ?string $hangupCause
     */
    #[JsonProperty('hangup_cause')]
    public ?string $hangupCause;

    /**
     * @var ?float $cost
     */
    #[JsonProperty('cost')]
    public ?float $cost;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?DateTime $startTime
     */
    #[JsonProperty('start_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startTime;

    /**
     * @var ?DateTime $answerTime
     */
    #[JsonProperty('answer_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $answerTime;

    /**
     * @var ?DateTime $endTime
     */
    #[JsonProperty('end_time'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endTime;

    /**
     * @var ?string $trunkId
     */
    #[JsonProperty('trunk_id')]
    public ?string $trunkId;

    /**
     * @var ?string $context
     */
    #[JsonProperty('context')]
    public ?string $context;

    /**
     * @var ?string $accountAuthId
     */
    #[JsonProperty('account_auth_id')]
    public ?string $accountAuthId;

    /**
     * @param array{
     *   callUuid?: ?string,
     *   fromNumber?: ?string,
     *   toNumber?: ?string,
     *   direction?: ?value-of<PartnerCdrDirection>,
     *   status?: ?value-of<PartnerCdrStatus>,
     *   durationSeconds?: ?int,
     *   hangupCause?: ?string,
     *   cost?: ?float,
     *   currency?: ?string,
     *   startTime?: ?DateTime,
     *   answerTime?: ?DateTime,
     *   endTime?: ?DateTime,
     *   trunkId?: ?string,
     *   context?: ?string,
     *   accountAuthId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->callUuid = $values['callUuid'] ?? null;
        $this->fromNumber = $values['fromNumber'] ?? null;
        $this->toNumber = $values['toNumber'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->durationSeconds = $values['durationSeconds'] ?? null;
        $this->hangupCause = $values['hangupCause'] ?? null;
        $this->cost = $values['cost'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->startTime = $values['startTime'] ?? null;
        $this->answerTime = $values['answerTime'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->trunkId = $values['trunkId'] ?? null;
        $this->context = $values['context'] ?? null;
        $this->accountAuthId = $values['accountAuthId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
