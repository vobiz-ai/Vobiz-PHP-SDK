<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListCustomerTransactionsResponseSummary extends JsonSerializableType
{
    /**
     * @var int $totalTransactions
     */
    #[JsonProperty('total_transactions')]
    public int $totalTransactions;

    /**
     * @var int $totalDebit
     */
    #[JsonProperty('total_debit')]
    public int $totalDebit;

    /**
     * @var int $totalCredit
     */
    #[JsonProperty('total_credit')]
    public int $totalCredit;

    /**
     * @var int $netAmount
     */
    #[JsonProperty('net_amount')]
    public int $netAmount;

    /**
     * @var array<ListCustomerTransactionsResponseSummaryByReferenceTypeItem> $byReferenceType
     */
    #[JsonProperty('by_reference_type'), ArrayType([ListCustomerTransactionsResponseSummaryByReferenceTypeItem::class])]
    public array $byReferenceType;

    /**
     * @param array{
     *   totalTransactions: int,
     *   totalDebit: int,
     *   totalCredit: int,
     *   netAmount: int,
     *   byReferenceType: array<ListCustomerTransactionsResponseSummaryByReferenceTypeItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->totalTransactions = $values['totalTransactions'];
        $this->totalDebit = $values['totalDebit'];
        $this->totalCredit = $values['totalCredit'];
        $this->netAmount = $values['netAmount'];
        $this->byReferenceType = $values['byReferenceType'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
