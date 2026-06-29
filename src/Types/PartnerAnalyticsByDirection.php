<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class PartnerAnalyticsByDirection extends JsonSerializableType
{
    /**
     * @var ?PartnerAnalyticsByDirectionInbound $inbound
     */
    #[JsonProperty('inbound')]
    public ?PartnerAnalyticsByDirectionInbound $inbound;

    /**
     * @var ?PartnerAnalyticsByDirectionOutbound $outbound
     */
    #[JsonProperty('outbound')]
    public ?PartnerAnalyticsByDirectionOutbound $outbound;

    /**
     * @param array{
     *   inbound?: ?PartnerAnalyticsByDirectionInbound,
     *   outbound?: ?PartnerAnalyticsByDirectionOutbound,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->inbound = $values['inbound'] ?? null;
        $this->outbound = $values['outbound'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
