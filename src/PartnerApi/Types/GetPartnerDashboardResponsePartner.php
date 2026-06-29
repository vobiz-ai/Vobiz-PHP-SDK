<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetPartnerDashboardResponsePartner extends JsonSerializableType
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
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $slug
     */
    #[JsonProperty('slug')]
    public string $slug;

    /**
     * @var string $company
     */
    #[JsonProperty('company')]
    public string $company;

    /**
     * @var string $authId
     */
    #[JsonProperty('auth_id')]
    public string $authId;

    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var string $phone
     */
    #[JsonProperty('phone')]
    public string $phone;

    /**
     * @var string $billingModel
     */
    #[JsonProperty('billing_model')]
    public string $billingModel;

    /**
     * @var bool $isActive
     */
    #[JsonProperty('is_active')]
    public bool $isActive;

    /**
     * @var bool $isVerified
     */
    #[JsonProperty('is_verified')]
    public bool $isVerified;

    /**
     * @var int $maxAccounts
     */
    #[JsonProperty('max_accounts')]
    public int $maxAccounts;

    /**
     * @var bool $canCreateAccounts
     */
    #[JsonProperty('can_create_accounts')]
    public bool $canCreateAccounts;

    /**
     * @var bool $canCreatePricingTiers
     */
    #[JsonProperty('can_create_pricing_tiers')]
    public bool $canCreatePricingTiers;

    /**
     * @var bool $canViewCdrs
     */
    #[JsonProperty('can_view_cdrs')]
    public bool $canViewCdrs;

    /**
     * @var bool $canTransferBalance
     */
    #[JsonProperty('can_transfer_balance')]
    public bool $canTransferBalance;

    /**
     * @var string $defaultPricingTierId
     */
    #[JsonProperty('default_pricing_tier_id')]
    public string $defaultPricingTierId;

    /**
     * @var int $accountCount
     */
    #[JsonProperty('account_count')]
    public int $accountCount;

    /**
     * @var mixed $balance
     */
    #[JsonProperty('balance')]
    public mixed $balance;

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
     *   accountId: int,
     *   name: string,
     *   slug: string,
     *   company: string,
     *   authId: string,
     *   email: string,
     *   phone: string,
     *   billingModel: string,
     *   isActive: bool,
     *   isVerified: bool,
     *   maxAccounts: int,
     *   canCreateAccounts: bool,
     *   canCreatePricingTiers: bool,
     *   canViewCdrs: bool,
     *   canTransferBalance: bool,
     *   defaultPricingTierId: string,
     *   accountCount: int,
     *   createdAt: string,
     *   updatedAt: string,
     *   balance?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->accountId = $values['accountId'];
        $this->name = $values['name'];
        $this->slug = $values['slug'];
        $this->company = $values['company'];
        $this->authId = $values['authId'];
        $this->email = $values['email'];
        $this->phone = $values['phone'];
        $this->billingModel = $values['billingModel'];
        $this->isActive = $values['isActive'];
        $this->isVerified = $values['isVerified'];
        $this->maxAccounts = $values['maxAccounts'];
        $this->canCreateAccounts = $values['canCreateAccounts'];
        $this->canCreatePricingTiers = $values['canCreatePricingTiers'];
        $this->canViewCdrs = $values['canViewCdrs'];
        $this->canTransferBalance = $values['canTransferBalance'];
        $this->defaultPricingTierId = $values['defaultPricingTierId'];
        $this->accountCount = $values['accountCount'];
        $this->balance = $values['balance'] ?? null;
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
