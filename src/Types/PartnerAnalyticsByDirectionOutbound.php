<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class PartnerAnalyticsByDirectionOutbound extends JsonSerializableType
{
    /**
     * @var ?int $calls
     */
    #[JsonProperty('calls')]
    public ?int $calls;

    /**
     * @var ?float $cost
     */
    #[JsonProperty('cost')]
    public ?float $cost;

    /**
     * @param array{
     *   calls?: ?int,
     *   cost?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->calls = $values['calls'] ?? null;
        $this->cost = $values['cost'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
