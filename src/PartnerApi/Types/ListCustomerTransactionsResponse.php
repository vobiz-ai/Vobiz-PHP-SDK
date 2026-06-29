<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListCustomerTransactionsResponse extends JsonSerializableType
{
    /**
     * @var array<ListCustomerTransactionsResponseTransactionsItem> $transactions
     */
    #[JsonProperty('transactions'), ArrayType([ListCustomerTransactionsResponseTransactionsItem::class])]
    public array $transactions;

    /**
     * @var ListCustomerTransactionsResponseSummary $summary
     */
    #[JsonProperty('summary')]
    public ListCustomerTransactionsResponseSummary $summary;

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
     * @var string $accountAuthId
     */
    #[JsonProperty('account_auth_id')]
    public string $accountAuthId;

    /**
     * @param array{
     *   transactions: array<ListCustomerTransactionsResponseTransactionsItem>,
     *   summary: ListCustomerTransactionsResponseSummary,
     *   total: int,
     *   page: int,
     *   perPage: int,
     *   totalPages: int,
     *   accountAuthId: string,
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
