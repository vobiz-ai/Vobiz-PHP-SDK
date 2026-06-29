<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetPartnerDashboardResponseTraffic extends JsonSerializableType
{
    /**
     * @var GetPartnerDashboardResponseTrafficInbound $inbound
     */
    #[JsonProperty('inbound')]
    public GetPartnerDashboardResponseTrafficInbound $inbound;

    /**
     * @var GetPartnerDashboardResponseTrafficOutbound $outbound
     */
    #[JsonProperty('outbound')]
    public GetPartnerDashboardResponseTrafficOutbound $outbound;

    /**
     * @param array{
     *   inbound: GetPartnerDashboardResponseTrafficInbound,
     *   outbound: GetPartnerDashboardResponseTrafficOutbound,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
