<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetPartnerDashboardResponseTimeSeriesItemOutbound extends JsonSerializableType
{
    /**
     * @var int $totalCalls
     */
    #[JsonProperty('total_calls')]
    public int $totalCalls;

    /**
     * @var int $answeredCalls
     */
    #[JsonProperty('answered_calls')]
    public int $answeredCalls;

    /**
     * @var float $totalMinutes
     */
    #[JsonProperty('total_minutes')]
    public float $totalMinutes;

    /**
     * @param array{
     *   totalCalls: int,
     *   answeredCalls: int,
     *   totalMinutes: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totalCalls = $values['totalCalls'];
        $this->answeredCalls = $values['answeredCalls'];
        $this->totalMinutes = $values['totalMinutes'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
