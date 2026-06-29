<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * Result of an atomic transfer from the partner master wallet to a customer sub-account.
 */
class BalanceTransferResult extends JsonSerializableType
{
    /**
     * @var ?string $transactionId
     */
    #[JsonProperty('transaction_id')]
    public ?string $transactionId;

    /**
     * @var ?string $customerAuthId
     */
    #[JsonProperty('customer_auth_id')]
    public ?string $customerAuthId;

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
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?float $partnerBalanceAfter
     */
    #[JsonProperty('partner_balance_after')]
    public ?float $partnerBalanceAfter;

    /**
     * @var ?float $customerBalanceAfter
     */
    #[JsonProperty('customer_balance_after')]
    public ?float $customerBalanceAfter;

    /**
     * @var ?value-of<BalanceTransferResultStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   transactionId?: ?string,
     *   customerAuthId?: ?string,
     *   amount?: ?float,
     *   currency?: ?string,
     *   description?: ?string,
     *   partnerBalanceAfter?: ?float,
     *   customerBalanceAfter?: ?float,
     *   status?: ?value-of<BalanceTransferResultStatus>,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->transactionId = $values['transactionId'] ?? null;
        $this->customerAuthId = $values['customerAuthId'] ?? null;
        $this->amount = $values['amount'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->partnerBalanceAfter = $values['partnerBalanceAfter'] ?? null;
        $this->customerBalanceAfter = $values['customerBalanceAfter'] ?? null;
        $this->status = $values['status'] ?? null;
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
