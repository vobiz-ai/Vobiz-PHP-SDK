<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use DateTime;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\Date;

class PartnerAnalyticsPeriod extends JsonSerializableType
{
    /**
     * @var ?DateTime $from
     */
    #[JsonProperty('from'), Date(Date::TYPE_DATE)]
    public ?DateTime $from;

    /**
     * @var ?DateTime $to
     */
    #[JsonProperty('to'), Date(Date::TYPE_DATE)]
    public ?DateTime $to;

    /**
     * @param array{
     *   from?: ?DateTime,
     *   to?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->from = $values['from'] ?? null;
        $this->to = $values['to'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
