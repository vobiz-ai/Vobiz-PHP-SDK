<?php

namespace Vobiz\Balance\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListTransactionsResponse extends JsonSerializableType
{
    /**
     * @var array<ListTransactionsResponseTransactionsItem> $transactions
     */
    #[JsonProperty('transactions'), ArrayType([ListTransactionsResponseTransactionsItem::class])]
    public array $transactions;

    /**
     * @var ListTransactionsResponseSummary $summary
     */
    #[JsonProperty('summary')]
    public ListTransactionsResponseSummary $summary;

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
     * @var int $perPage
     */
    #[JsonProperty('per_page')]
    public int $perPage;

    /**
     * @var int $totalPages
     */
    #[JsonProperty('total_pages')]
    public int $totalPages;

    /**
     * @param array{
     *   transactions: array<ListTransactionsResponseTransactionsItem>,
     *   summary: ListTransactionsResponseSummary,
     *   total: int,
     *   page: int,
     *   perPage: int,
     *   totalPages: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transactions = $values['transactions'];
        $this->summary = $values['summary'];
        $this->total = $values['total'];
        $this->page = $values['page'];
        $this->perPage = $values['perPage'];
        $this->totalPages = $values['totalPages'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
