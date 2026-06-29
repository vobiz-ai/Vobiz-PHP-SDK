<?php

namespace Vobiz\Balance\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetBalanceResponse extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $accountId
     */
    #[JsonProperty('account_id')]
    public string $accountId;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var float $balance
     */
    #[JsonProperty('balance')]
    public float $balance;

    /**
     * @var int $reservedFunds
     */
    #[JsonProperty('reserved_funds')]
    public int $reservedFunds;

    /**
     * @var int $promotionalBalance
     */
    #[JsonProperty('promotional_balance')]
    public int $promotionalBalance;

    /**
     * @var int $promotionalReservedBalance
     */
    #[JsonProperty('promotional_reserved_balance')]
    public int $promotionalReservedBalance;

    /**
     * @var float $availableBalance
     */
    #[JsonProperty('available_balance')]
    public float $availableBalance;

    /**
     * @var int $creditLimit
     */
    #[JsonProperty('credit_limit')]
    public int $creditLimit;

    /**
     * @var bool $isPostpaid
     */
    #[JsonProperty('is_postpaid')]
    public bool $isPostpaid;

    /**
     * @var string $creditLimitType
     */
    #[JsonProperty('credit_limit_type')]
    public string $creditLimitType;

    /**
     * @var int $lowBalanceThreshold
     */
    #[JsonProperty('low_balance_threshold')]
    public int $lowBalanceThreshold;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   accountId: string,
     *   currency: string,
     *   balance: float,
     *   reservedFunds: int,
     *   promotionalBalance: int,
     *   promotionalReservedBalance: int,
     *   availableBalance: float,
     *   creditLimit: int,
     *   isPostpaid: bool,
     *   creditLimitType: string,
     *   lowBalanceThreshold: int,
     *   status: string,
     *   createdAt: string,
     *   updatedAt: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->accountId = $values['accountId'];
        $this->currency = $values['currency'];
        $this->balance = $values['balance'];
        $this->reservedFunds = $values['reservedFunds'];
        $this->promotionalBalance = $values['promotionalBalance'];
        $this->promotionalReservedBalance = $values['promotionalReservedBalance'];
        $this->availableBalance = $values['availableBalance'];
        $this->creditLimit = $values['creditLimit'];
        $this->isPostpaid = $values['isPostpaid'];
        $this->creditLimitType = $values['creditLimitType'];
        $this->lowBalanceThreshold = $values['lowBalanceThreshold'];
        $this->status = $values['status'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
