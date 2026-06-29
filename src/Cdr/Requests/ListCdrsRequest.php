<?php

namespace Vobiz\Cdr\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use DateTime;
use Vobiz\Cdr\Types\ListCdrsRequestCallDirection;

class ListCdrsRequest extends JsonSerializableType
{
    /**
     * @var ?string $fromNumber Filter by the originating phone number (caller).
     */
    public ?string $fromNumber;

    /**
     * @var ?string $toNumber Filter by the destination phone number (callee).
     */
    public ?string $toNumber;

    /**
     * @var ?DateTime $startDate Beginning of the search period (YYYY-MM-DD). Required when using `end_date`.
     */
    public ?DateTime $startDate;

    /**
     * @var ?DateTime $endDate End of the search period (YYYY-MM-DD). Required when using `start_date`.
     */
    public ?DateTime $endDate;

    /**
     * @var ?value-of<ListCdrsRequestCallDirection> $callDirection Filter by direction.
     */
    public ?string $callDirection;

    /**
     * @var ?int $minDuration Minimum call duration in seconds. Excludes calls shorter than this value.
     */
    public ?int $minDuration;

    /**
     * @var ?int $page Page number for paginated results.
     */
    public ?int $page;

    /**
     * @var ?int $perPage Number of records per page. Max: 100.
     */
    public ?int $perPage;

    /**
     * @param array{
     *   fromNumber?: ?string,
     *   toNumber?: ?string,
     *   startDate?: ?DateTime,
     *   endDate?: ?DateTime,
     *   callDirection?: ?value-of<ListCdrsRequestCallDirection>,
     *   minDuration?: ?int,
     *   page?: ?int,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fromNumber = $values['fromNumber'] ?? null;
        $this->toNumber = $values['toNumber'] ?? null;
        $this->startDate = $values['startDate'] ?? null;
        $this->endDate = $values['endDate'] ?? null;
        $this->callDirection = $values['callDirection'] ?? null;
        $this->minDuration = $values['minDuration'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }
}
