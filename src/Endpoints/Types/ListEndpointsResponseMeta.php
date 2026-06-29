<?php

namespace Vobiz\Endpoints\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListEndpointsResponseMeta extends JsonSerializableType
{
    /**
     * @var int $limit
     */
    #[JsonProperty('limit')]
    public int $limit;

    /**
     * @var int $offset
     */
    #[JsonProperty('offset')]
    public int $offset;

    /**
     * @var int $totalCount
     */
    #[JsonProperty('total_count')]
    public int $totalCount;

    /**
     * @var mixed $next
     */
    #[JsonProperty('next')]
    public mixed $next;

    /**
     * @var mixed $previous
     */
    #[JsonProperty('previous')]
    public mixed $previous;

    /**
     * @param array{
     *   limit: int,
     *   offset: int,
     *   totalCount: int,
     *   next?: mixed,
     *   previous?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->limit = $values['limit'];
        $this->offset = $values['offset'];
        $this->totalCount = $values['totalCount'];
        $this->next = $values['next'] ?? null;
        $this->previous = $values['previous'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
