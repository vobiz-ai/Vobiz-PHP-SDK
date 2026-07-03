<?php

namespace Vobiz\PhoneNumbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\PhoneNumbers\Types\GetNumberHealthRequestGranularity;

class GetNumberHealthRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<GetNumberHealthRequestGranularity> $granularity Snapshot granularity.
     */
    public ?string $granularity;

    /**
     * @var ?int $days Size of the window (in days) for the summary and snapshots.
     */
    public ?int $days;

    /**
     * @param array{
     *   granularity?: ?value-of<GetNumberHealthRequestGranularity>,
     *   days?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->granularity = $values['granularity'] ?? null;
        $this->days = $values['days'] ?? null;
    }
}
