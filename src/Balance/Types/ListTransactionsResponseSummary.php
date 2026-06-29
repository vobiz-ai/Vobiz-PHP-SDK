<?php

namespace Vobiz\Balance\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListTransactionsResponseSummary extends JsonSerializableType
{
    /**
     * @var int $totalTransactions
     */
    #[JsonProperty('total_transactions')]
    public int $totalTransactions;

    /**
     * @var float $totalDebit
     */
    #[JsonProperty('total_debit')]
    public float $totalDebit;

    /**
     * @var int $totalCredit
     */
    #[JsonProperty('total_credit')]
    public int $totalCredit;

    /**
     * @var float $netAmount
     */
    #[JsonProperty('net_amount')]
    public float $netAmount;

    /**
     * @var array<ListTransactionsResponseSummaryByReferenceTypeItem> $byReferenceType
     */
    #[JsonProperty('by_reference_type'), ArrayType([ListTransactionsResponseSummaryByReferenceTypeItem::class])]
    public array $byReferenceType;

    /**
     * @param array{
     *   totalTransactions: int,
     *   totalDebit: float,
     *   totalCredit: int,
     *   netAmount: float,
     *   byReferenceType: array<ListTransactionsResponseSummaryByReferenceTypeItem>,
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
