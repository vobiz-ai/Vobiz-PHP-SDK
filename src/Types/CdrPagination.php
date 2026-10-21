<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Page-based pagination returned in the `pagination` object of the CDR list and search endpoints and the partner customer CDR endpoint. Loop while `has_next` is `true`, incrementing `page`.
 */
class CdrPagination extends JsonSerializableType
{
    /**
     * @var int $page Current page number, starting at 1.
     */
    #[JsonProperty('page')]
    public int $page;

    /**
     * @var int $perPage Number of records per page, as set by the `per_page` query parameter.
     */
    #[JsonProperty('per_page')]
    public int $perPage;

    /**
     * @var int $total Total number of records that match the filters across all pages.
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @var int $pages Total number of pages, `ceil(total / per_page)`.
     */
    #[JsonProperty('pages')]
    public int $pages;

    /**
     * @var bool $hasNext `true` when a page after this one exists.
     */
    #[JsonProperty('has_next')]
    public bool $hasNext;

    /**
     * @var bool $hasPrev `true` when a page before this one exists.
     */
    #[JsonProperty('has_prev')]
    public bool $hasPrev;

    /**
     * @param array{
     *   page: int,
     *   perPage: int,
     *   total: int,
     *   pages: int,
     *   hasNext: bool,
     *   hasPrev: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->page = $values['page'];
        $this->perPage = $values['perPage'];
        $this->total = $values['total'];
        $this->pages = $values['pages'];
        $this->hasNext = $values['hasNext'];
        $this->hasPrev = $values['hasPrev'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
