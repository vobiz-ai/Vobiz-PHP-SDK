<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class GetPartnerDashboardResponse extends JsonSerializableType
{
    /**
     * @var GetPartnerDashboardResponsePartner $partner
     */
    #[JsonProperty('partner')]
    public GetPartnerDashboardResponsePartner $partner;

    /**
     * @var GetPartnerDashboardResponsePeriod $period
     */
    #[JsonProperty('period')]
    public GetPartnerDashboardResponsePeriod $period;

    /**
     * @var GetPartnerDashboardResponseAccounts $accounts
     */
    #[JsonProperty('accounts')]
    public GetPartnerDashboardResponseAccounts $accounts;

    /**
     * @var string $totalBalance
     */
    #[JsonProperty('total_balance')]
    public string $totalBalance;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var GetPartnerDashboardResponseCalls $calls
     */
    #[JsonProperty('calls')]
    public GetPartnerDashboardResponseCalls $calls;

    /**
     * @var GetPartnerDashboardResponseTraffic $traffic
     */
    #[JsonProperty('traffic')]
    public GetPartnerDashboardResponseTraffic $traffic;

    /**
     * @var GetPartnerDashboardResponseByProduct $byProduct
     */
    #[JsonProperty('by_product')]
    public GetPartnerDashboardResponseByProduct $byProduct;

    /**
     * @var array<GetPartnerDashboardResponseTimeSeriesItem> $timeSeries
     */
    #[JsonProperty('time_series'), ArrayType([GetPartnerDashboardResponseTimeSeriesItem::class])]
    public array $timeSeries;

    /**
     * @param array{
     *   partner: GetPartnerDashboardResponsePartner,
     *   period: GetPartnerDashboardResponsePeriod,
     *   accounts: GetPartnerDashboardResponseAccounts,
     *   totalBalance: string,
     *   currency: string,
     *   calls: GetPartnerDashboardResponseCalls,
     *   traffic: GetPartnerDashboardResponseTraffic,
     *   byProduct: GetPartnerDashboardResponseByProduct,
     *   timeSeries: array<GetPartnerDashboardResponseTimeSeriesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->partner = $values['partner'];
        $this->period = $values['period'];
        $this->accounts = $values['accounts'];
        $this->totalBalance = $values['totalBalance'];
        $this->currency = $values['currency'];
        $this->calls = $values['calls'];
        $this->traffic = $values['traffic'];
        $this->byProduct = $values['byProduct'];
        $this->timeSeries = $values['timeSeries'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
