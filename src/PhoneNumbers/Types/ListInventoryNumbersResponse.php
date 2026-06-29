<?php

namespace Vobiz\PhoneNumbers\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListInventoryNumbersResponse extends JsonSerializableType
{
    /**
     * @var array<ListInventoryNumbersResponseItemsItem> $items
     */
    #[JsonProperty('items'), ArrayType([ListInventoryNumbersResponseItemsItem::class])]
    public array $items;

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
     * @param array{
     *   items: array<ListInventoryNumbersResponseItemsItem>,
     *   page: int,
     *   perPage: int,
     *   total: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'];
        $this->page = $values['page'];
        $this->perPage = $values['perPage'];
        $this->total = $values['total'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
