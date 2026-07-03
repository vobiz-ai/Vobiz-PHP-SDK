<?php

namespace Vobiz\PhoneNumbers\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetNumberHealthResponseSummary extends JsonSerializableType
{
    /**
     * @var ?int $periodDays
     */
    #[JsonProperty('period_days')]
    public ?int $periodDays;

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
     * @var ?float $answerRate
     */
    #[JsonProperty('answer_rate')]
    public ?float $answerRate;

    /**
     * @var ?float $totalMinutes
     */
    #[JsonProperty('total_minutes')]
    public ?float $totalMinutes;

    /**
     * @var ?float $avgDuration
     */
    #[JsonProperty('avg_duration')]
    public ?float $avgDuration;

    /**
     * @param array{
     *   periodDays?: ?int,
     *   totalCalls?: ?int,
     *   answeredCalls?: ?int,
     *   answerRate?: ?float,
     *   totalMinutes?: ?float,
     *   avgDuration?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->periodDays = $values['periodDays'] ?? null;
        $this->totalCalls = $values['totalCalls'] ?? null;
        $this->answeredCalls = $values['answeredCalls'] ?? null;
        $this->answerRate = $values['answerRate'] ?? null;
        $this->totalMinutes = $values['totalMinutes'] ?? null;
        $this->avgDuration = $values['avgDuration'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
