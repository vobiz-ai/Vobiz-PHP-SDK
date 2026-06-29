<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * Aggregated call analytics across all customer accounts for a date range.
 */
class PartnerAnalytics extends JsonSerializableType
{
    /**
     * @var ?PartnerAnalyticsPeriod $period
     */
    #[JsonProperty('period')]
    public ?PartnerAnalyticsPeriod $period;

    /**
     * @var ?PartnerAnalyticsTotals $totals
     */
    #[JsonProperty('totals')]
    public ?PartnerAnalyticsTotals $totals;

    /**
     * @var ?PartnerAnalyticsByDirection $byDirection
     */
    #[JsonProperty('by_direction')]
    public ?PartnerAnalyticsByDirection $byDirection;

    /**
     * @var ?array<PartnerAnalyticsTopCustomersItem> $topCustomers
     */
    #[JsonProperty('top_customers'), ArrayType([PartnerAnalyticsTopCustomersItem::class])]
    public ?array $topCustomers;

    /**
     * @param array{
     *   period?: ?PartnerAnalyticsPeriod,
     *   totals?: ?PartnerAnalyticsTotals,
     *   byDirection?: ?PartnerAnalyticsByDirection,
     *   topCustomers?: ?array<PartnerAnalyticsTopCustomersItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->period = $values['period'] ?? null;
        $this->totals = $values['totals'] ?? null;
        $this->byDirection = $values['byDirection'] ?? null;
        $this->topCustomers = $values['topCustomers'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
