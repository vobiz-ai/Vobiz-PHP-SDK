<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Offset-based pagination metadata returned in the `meta` object of the Application, Endpoint and Recording list endpoints. To fetch the next page, add `limit` to `offset`, or request the `next` URL as-is.
 */
class PaginationMeta extends JsonSerializableType
{
    /**
     * @var int $limit Maximum number of items in `objects` for this request, as set by the `limit` query parameter (default 20).
     */
    #[JsonProperty('limit')]
    public int $limit;

    /**
     * @var int $offset Zero-based position of the first item in `objects`, as set by the `offset` query parameter.
     */
    #[JsonProperty('offset')]
    public int $offset;

    /**
     * @var int $totalCount Total number of items that match the request across all pages.
     */
    #[JsonProperty('total_count')]
    public int $totalCount;

    /**
     * @var ?string $next Relative URL of the next page with `limit` and `offset` already set, or `null` on the last page.
     */
    #[JsonProperty('next')]
    public ?string $next;

    /**
     * @var ?string $previous Relative URL of the previous page, or `null` on the first page.
     */
    #[JsonProperty('previous')]
    public ?string $previous;

    /**
     * @param array{
     *   limit: int,
     *   offset: int,
     *   totalCount: int,
     *   next?: ?string,
     *   previous?: ?string,
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
