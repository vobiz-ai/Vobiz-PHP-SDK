<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListCustomerCdrsResponseSummary extends JsonSerializableType
{
    /**
     * @var int $answerRate
     */
    #[JsonProperty('answerRate')]
    public int $answerRate;

    /**
     * @var int $answeredCalls
     */
    #[JsonProperty('answeredCalls')]
    public int $answeredCalls;

    /**
     * @var string $avgCallDuration
     */
    #[JsonProperty('avgCallDuration')]
    public string $avgCallDuration;

    /**
     * @var string $lastCallAt
     */
    #[JsonProperty('last_call_at')]
    public string $lastCallAt;

    /**
     * @var int $totalCalls
     */
    #[JsonProperty('totalCalls')]
    public int $totalCalls;

    /**
     * @var int $totalBillableSeconds
     */
    #[JsonProperty('total_billable_seconds')]
    public int $totalBillableSeconds;

    /**
     * @var int $totalCost
     */
    #[JsonProperty('total_cost')]
    public int $totalCost;

    /**
     * @var int $totalDurationSeconds
     */
    #[JsonProperty('total_duration_seconds')]
    public int $totalDurationSeconds;

    /**
     * @param array{
     *   answerRate: int,
     *   answeredCalls: int,
     *   avgCallDuration: string,
     *   lastCallAt: string,
     *   totalCalls: int,
     *   totalBillableSeconds: int,
     *   totalCost: int,
     *   totalDurationSeconds: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->answerRate = $values['answerRate'];
        $this->answeredCalls = $values['answeredCalls'];
        $this->avgCallDuration = $values['avgCallDuration'];
        $this->lastCallAt = $values['lastCallAt'];
        $this->totalCalls = $values['totalCalls'];
        $this->totalBillableSeconds = $values['totalBillableSeconds'];
        $this->totalCost = $values['totalCost'];
        $this->totalDurationSeconds = $values['totalDurationSeconds'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
