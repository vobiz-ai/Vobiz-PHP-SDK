<?php

namespace Vobiz\Cdr\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListCdrsResponsePagination extends JsonSerializableType
{
    /**
     * @var int $page
     */
    #[JsonProperty('page')]
    public int $page;

    /**
     * @var int $perPage
     */
    #[JsonProperty('per_page')]
    public int $perPage;

    /**
     * @var int $total
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @var int $pages
     */
    #[JsonProperty('pages')]
    public int $pages;

    /**
     * @var bool $hasNext
     */
    #[JsonProperty('has_next')]
    public bool $hasNext;

    /**
     * @var bool $hasPrev
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
