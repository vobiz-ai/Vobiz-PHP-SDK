<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListCustomerNumbersResponse extends JsonSerializableType
{
    /**
     * @var array<mixed> $items
     */
    #[JsonProperty('items'), ArrayType(['mixed'])]
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
     * @var string $accountAuthId
     */
    #[JsonProperty('account_auth_id')]
    public string $accountAuthId;

    /**
     * @param array{
     *   items: array<mixed>,
     *   page: int,
     *   perPage: int,
     *   total: int,
     *   accountAuthId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->items = $values['items'];
        $this->page = $values['page'];
        $this->perPage = $values['perPage'];
        $this->total = $values['total'];
        $this->accountAuthId = $values['accountAuthId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
