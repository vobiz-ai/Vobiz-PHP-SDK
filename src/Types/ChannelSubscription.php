<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

class ChannelSubscription extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var int $accountId
     */
    #[JsonProperty('account_id')]
    public int $accountId;

    /**
     * @var value-of<CapacityResourceType> $resourceType
     */
    #[JsonProperty('resource_type')]
    public string $resourceType;

    /**
     * @var int $quantity
     */
    #[JsonProperty('quantity')]
    public int $quantity;

    /**
     * @var string $monthlyCost Recurring monthly charge as a decimal string.
     */
    #[JsonProperty('monthly_cost')]
    public string $monthlyCost;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var DateTime $lastBillingDate
     */
    #[JsonProperty('last_billing_date'), Date(Date::TYPE_DATETIME)]
    public DateTime $lastBillingDate;

    /**
     * @var DateTime $nextBillingDate
     */
    #[JsonProperty('next_billing_date'), Date(Date::TYPE_DATETIME)]
    public DateTime $nextBillingDate;

    /**
     * @var DateTime $purchasedAt
     */
    #[JsonProperty('purchased_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $purchasedAt;

    /**
     * @var ?DateTime $cancelledAt
     */
    #[JsonProperty('cancelled_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $cancelledAt;

    /**
     * @var ?string $cancellationReason
     */
    #[JsonProperty('cancellation_reason')]
    public ?string $cancellationReason;

    /**
     * @var bool $isActive
     */
    #[JsonProperty('is_active')]
    public bool $isActive;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   accountId: int,
     *   resourceType: value-of<CapacityResourceType>,
     *   quantity: int,
     *   monthlyCost: string,
     *   currency: string,
     *   status: string,
     *   lastBillingDate: DateTime,
     *   nextBillingDate: DateTime,
     *   purchasedAt: DateTime,
     *   isActive: bool,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   cancelledAt?: ?DateTime,
     *   cancellationReason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->accountId = $values['accountId'];
        $this->resourceType = $values['resourceType'];
        $this->quantity = $values['quantity'];
        $this->monthlyCost = $values['monthlyCost'];
        $this->currency = $values['currency'];
        $this->status = $values['status'];
        $this->lastBillingDate = $values['lastBillingDate'];
        $this->nextBillingDate = $values['nextBillingDate'];
        $this->purchasedAt = $values['purchasedAt'];
        $this->cancelledAt = $values['cancelledAt'] ?? null;
        $this->cancellationReason = $values['cancellationReason'] ?? null;
        $this->isActive = $values['isActive'];
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
