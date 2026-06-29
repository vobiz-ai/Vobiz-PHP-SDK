<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetPartnerDashboardResponseTimeSeriesItem extends JsonSerializableType
{
    /**
     * @var string $date
     */
    #[JsonProperty('date')]
    public string $date;

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
     * @var string $totalCost
     */
    #[JsonProperty('total_cost')]
    public string $totalCost;

    /**
     * @var GetPartnerDashboardResponseTimeSeriesItemInbound $inbound
     */
    #[JsonProperty('inbound')]
    public GetPartnerDashboardResponseTimeSeriesItemInbound $inbound;

    /**
     * @var GetPartnerDashboardResponseTimeSeriesItemOutbound $outbound
     */
    #[JsonProperty('outbound')]
    public GetPartnerDashboardResponseTimeSeriesItemOutbound $outbound;

    /**
     * @param array{
     *   date: string,
     *   totalCalls: int,
     *   answeredCalls: int,
     *   totalMinutes: float,
     *   totalCost: string,
     *   inbound: GetPartnerDashboardResponseTimeSeriesItemInbound,
     *   outbound: GetPartnerDashboardResponseTimeSeriesItemOutbound,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->date = $values['date'];
        $this->totalCalls = $values['totalCalls'];
        $this->answeredCalls = $values['answeredCalls'];
        $this->totalMinutes = $values['totalMinutes'];
        $this->totalCost = $values['totalCost'];
        $this->inbound = $values['inbound'];
        $this->outbound = $values['outbound'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
