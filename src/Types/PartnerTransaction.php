<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * A single credit or debit ledger entry on a partner or customer account.
 */
class PartnerTransaction extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?value-of<PartnerTransactionType> $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?float $amount
     */
    #[JsonProperty('amount')]
    public ?float $amount;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?float $balanceBefore
     */
    #[JsonProperty('balance_before')]
    public ?float $balanceBefore;

    /**
     * @var ?float $balanceAfter
     */
    #[JsonProperty('balance_after')]
    public ?float $balanceAfter;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $initiatedBy
     */
    #[JsonProperty('initiated_by')]
    public ?string $initiatedBy;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   id?: ?string,
     *   type?: ?value-of<PartnerTransactionType>,
     *   amount?: ?float,
     *   currency?: ?string,
     *   balanceBefore?: ?float,
     *   balanceAfter?: ?float,
     *   description?: ?string,
     *   initiatedBy?: ?string,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->amount = $values['amount'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->balanceBefore = $values['balanceBefore'] ?? null;
        $this->balanceAfter = $values['balanceAfter'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->initiatedBy = $values['initiatedBy'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
