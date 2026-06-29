<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListCustomerAccountsResponseAccountsItem extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

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
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $gstin
     */
    #[JsonProperty('gstin')]
    public ?string $gstin;

    /**
     * @var ?string $gstStatus
     */
    #[JsonProperty('gst_status')]
    public ?string $gstStatus;

    /**
     * @var bool $tdsEnabled
     */
    #[JsonProperty('tds_enabled')]
    public bool $tdsEnabled;

    /**
     * @var int $tdsPercentage
     */
    #[JsonProperty('tds_percentage')]
    public int $tdsPercentage;

    /**
     * @var string $businessType
     */
    #[JsonProperty('business_type')]
    public string $businessType;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $authId
     */
    #[JsonProperty('auth_id')]
    public string $authId;

    /**
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var string $accountType
     */
    #[JsonProperty('account_type')]
    public string $accountType;

    /**
     * @var string $role
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @var bool $postpaid
     */
    #[JsonProperty('postpaid')]
    public bool $postpaid;

    /**
     * @var ?string $address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?string $city
     */
    #[JsonProperty('city')]
    public ?string $city;

    /**
     * @var ?string $state
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @var string $country
     */
    #[JsonProperty('country')]
    public string $country;

    /**
     * @var ?string $zipCode
     */
    #[JsonProperty('zip_code')]
    public ?string $zipCode;

    /**
     * @var string $company
     */
    #[JsonProperty('company')]
    public string $company;

    /**
     * @var string $billingMode
     */
    #[JsonProperty('billing_mode')]
    public string $billingMode;

    /**
     * @var bool $autoRecharge
     */
    #[JsonProperty('auto_recharge')]
    public bool $autoRecharge;

    /**
     * @var string $cashCredits
     */
    #[JsonProperty('cash_credits')]
    public string $cashCredits;

    /**
     * @var int $cpsLimit
     */
    #[JsonProperty('cps_limit')]
    public int $cpsLimit;

    /**
     * @var int $concurrentCallsLimit
     */
    #[JsonProperty('concurrent_calls_limit')]
    public int $concurrentCallsLimit;

    /**
     * @var mixed $baseCpsLimit
     */
    #[JsonProperty('base_cps_limit')]
    public mixed $baseCpsLimit;

    /**
     * @var mixed $baseConcurrentCallsLimit
     */
    #[JsonProperty('base_concurrent_calls_limit')]
    public mixed $baseConcurrentCallsLimit;

    /**
     * @var mixed $purchasedCps
     */
    #[JsonProperty('purchased_cps')]
    public mixed $purchasedCps;

    /**
     * @var mixed $purchasedConcurrentCalls
     */
    #[JsonProperty('purchased_concurrent_calls')]
    public mixed $purchasedConcurrentCalls;

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
     * @var bool $isTrialAccount
     */
    #[JsonProperty('is_trial_account')]
    public bool $isTrialAccount;

    /**
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var string $kycStatus
     */
    #[JsonProperty('kyc_status')]
    public string $kycStatus;

    /**
     * @var mixed $googleId
     */
    #[JsonProperty('google_id')]
    public mixed $googleId;

    /**
     * @var ?string $referralCode
     */
    #[JsonProperty('referral_code')]
    public ?string $referralCode;

    /**
     * @var bool $referralDisabled
     */
    #[JsonProperty('referral_disabled')]
    public bool $referralDisabled;

    /**
     * @var mixed $customReferrerRewardAmount
     */
    #[JsonProperty('custom_referrer_reward_amount')]
    public mixed $customReferrerRewardAmount;

    /**
     * @var mixed $customRefereeRewardAmount
     */
    #[JsonProperty('custom_referee_reward_amount')]
    public mixed $customRefereeRewardAmount;

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
     * @var ?string $lastLogin
     */
    #[JsonProperty('last_login')]
    public ?string $lastLogin;

    /**
     * @var string $pricingTierId
     */
    #[JsonProperty('pricing_tier_id')]
    public string $pricingTierId;

    /**
     * @var ListCustomerAccountsResponseAccountsItemPricingTier $pricingTier
     */
    #[JsonProperty('pricing_tier')]
    public ListCustomerAccountsResponseAccountsItemPricingTier $pricingTier;

    /**
     * @var string $partnerId
     */
    #[JsonProperty('partner_id')]
    public string $partnerId;

    /**
     * @var mixed $autoRechargeConfig
     */
    #[JsonProperty('auto_recharge_config')]
    public mixed $autoRechargeConfig;

    /**
     * @var string $resourceUri
     */
    #[JsonProperty('resource_uri')]
    public string $resourceUri;

    /**
     * @var string $authToken
     */
    #[JsonProperty('auth_token')]
    public string $authToken;

    /**
     * @param array{
     *   name: string,
     *   email: string,
     *   phone: string,
     *   tdsEnabled: bool,
     *   tdsPercentage: int,
     *   businessType: string,
     *   id: string,
     *   authId: string,
     *   apiId: string,
     *   accountType: string,
     *   role: string,
     *   postpaid: bool,
     *   country: string,
     *   company: string,
     *   billingMode: string,
     *   autoRecharge: bool,
     *   cashCredits: string,
     *   cpsLimit: int,
     *   concurrentCallsLimit: int,
     *   isActive: bool,
     *   isVerified: bool,
     *   isTrialAccount: bool,
     *   enabled: bool,
     *   kycStatus: string,
     *   referralDisabled: bool,
     *   createdAt: string,
     *   updatedAt: string,
     *   pricingTierId: string,
     *   pricingTier: ListCustomerAccountsResponseAccountsItemPricingTier,
     *   partnerId: string,
     *   resourceUri: string,
     *   authToken: string,
     *   description?: ?string,
     *   gstin?: ?string,
     *   gstStatus?: ?string,
     *   address?: ?string,
     *   city?: ?string,
     *   state?: ?string,
     *   timezone?: ?string,
     *   zipCode?: ?string,
     *   baseCpsLimit?: mixed,
     *   baseConcurrentCallsLimit?: mixed,
     *   purchasedCps?: mixed,
     *   purchasedConcurrentCalls?: mixed,
     *   googleId?: mixed,
     *   referralCode?: ?string,
     *   customReferrerRewardAmount?: mixed,
     *   customRefereeRewardAmount?: mixed,
     *   lastLogin?: ?string,
     *   autoRechargeConfig?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->email = $values['email'];
        $this->phone = $values['phone'];
        $this->description = $values['description'] ?? null;
        $this->gstin = $values['gstin'] ?? null;
        $this->gstStatus = $values['gstStatus'] ?? null;
        $this->tdsEnabled = $values['tdsEnabled'];
        $this->tdsPercentage = $values['tdsPercentage'];
        $this->businessType = $values['businessType'];
        $this->id = $values['id'];
        $this->authId = $values['authId'];
        $this->apiId = $values['apiId'];
        $this->accountType = $values['accountType'];
        $this->role = $values['role'];
        $this->postpaid = $values['postpaid'];
        $this->address = $values['address'] ?? null;
        $this->city = $values['city'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->country = $values['country'];
        $this->zipCode = $values['zipCode'] ?? null;
        $this->company = $values['company'];
        $this->billingMode = $values['billingMode'];
        $this->autoRecharge = $values['autoRecharge'];
        $this->cashCredits = $values['cashCredits'];
        $this->cpsLimit = $values['cpsLimit'];
        $this->concurrentCallsLimit = $values['concurrentCallsLimit'];
        $this->baseCpsLimit = $values['baseCpsLimit'] ?? null;
        $this->baseConcurrentCallsLimit = $values['baseConcurrentCallsLimit'] ?? null;
        $this->purchasedCps = $values['purchasedCps'] ?? null;
        $this->purchasedConcurrentCalls = $values['purchasedConcurrentCalls'] ?? null;
        $this->isActive = $values['isActive'];
        $this->isVerified = $values['isVerified'];
        $this->isTrialAccount = $values['isTrialAccount'];
        $this->enabled = $values['enabled'];
        $this->kycStatus = $values['kycStatus'];
        $this->googleId = $values['googleId'] ?? null;
        $this->referralCode = $values['referralCode'] ?? null;
        $this->referralDisabled = $values['referralDisabled'];
        $this->customReferrerRewardAmount = $values['customReferrerRewardAmount'] ?? null;
        $this->customRefereeRewardAmount = $values['customRefereeRewardAmount'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->lastLogin = $values['lastLogin'] ?? null;
        $this->pricingTierId = $values['pricingTierId'];
        $this->pricingTier = $values['pricingTier'];
        $this->partnerId = $values['partnerId'];
        $this->autoRechargeConfig = $values['autoRechargeConfig'] ?? null;
        $this->resourceUri = $values['resourceUri'];
        $this->authToken = $values['authToken'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
