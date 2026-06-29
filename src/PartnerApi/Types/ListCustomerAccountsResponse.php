<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListCustomerAccountsResponse extends JsonSerializableType
{
    /**
     * @var array<ListCustomerAccountsResponseAccountsItem> $accounts
     */
    #[JsonProperty('accounts'), ArrayType([ListCustomerAccountsResponseAccountsItem::class])]
    public array $accounts;

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
     *   accounts: array<ListCustomerAccountsResponseAccountsItem>,
     *   total: int,
     *   page: int,
     *   size: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accounts = $values['accounts'];
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
