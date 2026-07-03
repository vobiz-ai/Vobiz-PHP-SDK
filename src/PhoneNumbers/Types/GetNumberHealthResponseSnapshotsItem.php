<?php

namespace Vobiz\PhoneNumbers\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

class GetNumberHealthResponseSnapshotsItem extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?DateTime $ts
     */
    #[JsonProperty('ts'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $ts;

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
     * @var ?float $answerRate
     */
    #[JsonProperty('answer_rate')]
    public ?float $answerRate;

    /**
     * @var ?float $totalDuration
     */
    #[JsonProperty('total_duration')]
    public ?float $totalDuration;

    /**
     * @var ?float $avgDuration
     */
    #[JsonProperty('avg_duration')]
    public ?float $avgDuration;

    /**
     * @var ?float $totalMinutes
     */
    #[JsonProperty('total_minutes')]
    public ?float $totalMinutes;

    /**
     * @param array{
     *   id?: ?string,
     *   ts?: ?DateTime,
     *   totalCalls?: ?int,
     *   answeredCalls?: ?int,
     *   failedCalls?: ?int,
     *   answerRate?: ?float,
     *   totalDuration?: ?float,
     *   avgDuration?: ?float,
     *   totalMinutes?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->ts = $values['ts'] ?? null;
        $this->totalCalls = $values['totalCalls'] ?? null;
        $this->answeredCalls = $values['answeredCalls'] ?? null;
        $this->failedCalls = $values['failedCalls'] ?? null;
        $this->answerRate = $values['answerRate'] ?? null;
        $this->totalDuration = $values['totalDuration'] ?? null;
        $this->avgDuration = $values['avgDuration'] ?? null;
        $this->totalMinutes = $values['totalMinutes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
