<?php

namespace Vobiz\Applications\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListApplicationsResponseMeta extends JsonSerializableType
{
    /**
     * @var int $limit
     */
    #[JsonProperty('limit')]
    public int $limit;

    /**
     * @var string $next
     */
    #[JsonProperty('next')]
    public string $next;

    /**
     * @var int $offset
     */
    #[JsonProperty('offset')]
    public int $offset;

    /**
     * @var mixed $previous
     */
    #[JsonProperty('previous')]
    public mixed $previous;

    /**
     * @var int $totalCount
     */
    #[JsonProperty('total_count')]
    public int $totalCount;

    /**
     * @param array{
     *   limit: int,
     *   next: string,
     *   offset: int,
     *   totalCount: int,
     *   previous?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->limit = $values['limit'];
        $this->next = $values['next'];
        $this->offset = $values['offset'];
        $this->previous = $values['previous'] ?? null;
        $this->totalCount = $values['totalCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
