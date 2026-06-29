<?php

namespace Vobiz\Balance\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListTransactionsResponseSummaryByReferenceTypeItem extends JsonSerializableType
{
    /**
     * @var string $referenceType
     */
    #[JsonProperty('reference_type')]
    public string $referenceType;

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
     * @var int $count
     */
    #[JsonProperty('count')]
    public int $count;

    /**
     * @param array{
     *   referenceType: string,
     *   totalDebit: float,
     *   totalCredit: int,
     *   count: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->referenceType = $values['referenceType'];
        $this->totalDebit = $values['totalDebit'];
        $this->totalCredit = $values['totalCredit'];
        $this->count = $values['count'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
