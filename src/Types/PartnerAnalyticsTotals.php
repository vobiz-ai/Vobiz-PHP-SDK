<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class PartnerAnalyticsTotals extends JsonSerializableType
{
    /**
     * @var ?int $totalCalls
     */
    #[JsonProperty('total_calls')]
    public ?int $totalCalls;

    /**
     * @var ?int $answeredCalls
     */
    #[JsonProperty('answered_calls')]
    public ?int $answeredCalls;

    /**
     * @var ?int $failedCalls
     */
    #[JsonProperty('failed_calls')]
    public ?int $failedCalls;

    /**
     * @var ?int $totalDurationSeconds
     */
    #[JsonProperty('total_duration_seconds')]
    public ?int $totalDurationSeconds;

    /**
     * @var ?float $totalCost
     */
    #[JsonProperty('total_cost')]
    public ?float $totalCost;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @param array{
     *   totalCalls?: ?int,
     *   answeredCalls?: ?int,
     *   failedCalls?: ?int,
     *   totalDurationSeconds?: ?int,
     *   totalCost?: ?float,
     *   currency?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->totalCalls = $values['totalCalls'] ?? null;
        $this->answeredCalls = $values['answeredCalls'] ?? null;
        $this->failedCalls = $values['failedCalls'] ?? null;
        $this->totalDurationSeconds = $values['totalDurationSeconds'] ?? null;
        $this->totalCost = $values['totalCost'] ?? null;
        $this->currency = $values['currency'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
