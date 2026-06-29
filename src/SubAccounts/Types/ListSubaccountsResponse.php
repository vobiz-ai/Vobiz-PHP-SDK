<?php

namespace Vobiz\SubAccounts\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListSubaccountsResponse extends JsonSerializableType
{
    /**
     * @var array<ListSubaccountsResponseSubAccountsItem> $subAccounts
     */
    #[JsonProperty('sub_accounts'), ArrayType([ListSubaccountsResponseSubAccountsItem::class])]
    public array $subAccounts;

    /**
     * @var int $total
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @var int $page
     */
    #[JsonProperty('page')]
    public int $page;

    /**
     * @var int $size
     */
    #[JsonProperty('size')]
    public int $size;

    /**
     * @param array{
     *   subAccounts: array<ListSubaccountsResponseSubAccountsItem>,
     *   total: int,
     *   page: int,
     *   size: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subAccounts = $values['subAccounts'];
        $this->total = $values['total'];
        $this->page = $values['page'];
        $this->size = $values['size'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
