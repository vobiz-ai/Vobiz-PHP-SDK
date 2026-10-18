<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * Coverage summary rows for every country that matches your filters.
 */
class CoverageList extends JsonSerializableType
{
    /**
     * @var ?array<CoverageSummary> $countries One summary row per matching country, sorted by country name. Empty array when nothing matches.
     */
    #[JsonProperty('countries'), ArrayType([CoverageSummary::class])]
    public ?array $countries;

    /**
     * @var ?int $total Number of rows in `countries` after filtering.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?DateTime $updatedAt When the coverage dataset was last refreshed (ISO 8601).
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   countries?: ?array<CoverageSummary>,
     *   total?: ?int,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->countries = $values['countries'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
