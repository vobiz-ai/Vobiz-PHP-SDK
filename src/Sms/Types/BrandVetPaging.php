<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Paging details for a list of brand vets.
 */
class BrandVetPaging extends JsonSerializableType
{
    /**
     * @var ?int $page Zero-based index of this page, echoing the `page` you requested.
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?int $size Page size applied to the request; `20` when you omit `size` or send `0`.
     */
    #[JsonProperty('size')]
    public ?int $size;

    /**
     * @var ?int $totalPages Total number of pages at this `size`.
     */
    #[JsonProperty('totalPages')]
    public ?int $totalPages;

    /**
     * @var ?int $totalResults Total number of vetting records for the brand.
     */
    #[JsonProperty('totalResults')]
    public ?int $totalResults;

    /**
     * @param array{
     *   page?: ?int,
     *   size?: ?int,
     *   totalPages?: ?int,
     *   totalResults?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->size = $values['size'] ?? null;
        $this->totalPages = $values['totalPages'] ?? null;
        $this->totalResults = $values['totalResults'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
