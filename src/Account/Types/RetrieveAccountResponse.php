<?php

namespace Vobiz\Account\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class RetrieveAccountResponse extends JsonSerializableType
{
    /**
     * @var string $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

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
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $authId
     */
    #[JsonProperty('auth_id')]
    public string $authId;

    /**
     * @var string $authSecret
     */
    #[JsonProperty('auth_secret')]
    public string $authSecret;

    /**
     * @var mixed $authTokenExpireTime
     */
    #[JsonProperty('auth_token_expire_time')]
    public mixed $authTokenExpireTime;

    /**
     * @var string $country
     */
    #[JsonProperty('country')]
    public string $country;

    /**
     * @var string $timezone
     */
    #[JsonProperty('timezone')]
    public string $timezone;

    /**
     * @var string $city
     */
    #[JsonProperty('city')]
    public string $city;

    /**
     * @var string $state
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @var string $address
     */
    #[JsonProperty('address')]
    public string $address;

    /**
     * @var string $zipCode
     */
    #[JsonProperty('zip_code')]
    public string $zipCode;

    /**
     * @var string $company
     */
    #[JsonProperty('company')]
    public string $company;

    /**
     * @var string $accountType
     */
    #[JsonProperty('account_type')]
    public string $accountType;

    /**
     * @var bool $postpaid
     */
    #[JsonProperty('postpaid')]
    public bool $postpaid;

    /**
     * @var bool $autoRecharge
     */
    #[JsonProperty('auto_recharge')]
    public bool $autoRecharge;

    /**
     * @var mixed $autoRechargeConfig
     */
    #[JsonProperty('auto_recharge_config')]
    public mixed $autoRechargeConfig;

    /**
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var mixed $carrierType
     */
    #[JsonProperty('carrier_type')]
    public mixed $carrierType;

    /**
     * @var mixed $customerType
     */
    #[JsonProperty('customer_type')]
    public mixed $customerType;

    /**
     * @var int $creditLimit
     */
    #[JsonProperty('credit_limit')]
    public int $creditLimit;

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
     * @var int $baseCpsLimit
     */
    #[JsonProperty('base_cps_limit')]
    public int $baseCpsLimit;

    /**
     * @var int $baseConcurrentCallsLimit
     */
    #[JsonProperty('base_concurrent_calls_limit')]
    public int $baseConcurrentCallsLimit;

    /**
     * @var int $purchasedCps
     */
    #[JsonProperty('purchased_cps')]
    public int $purchasedCps;

    /**
     * @var int $purchasedConcurrentCalls
     */
    #[JsonProperty('purchased_concurrent_calls')]
    public int $purchasedConcurrentCalls;

    /**
     * @var int $riskRating
     */
    #[JsonProperty('risk_rating')]
    public int $riskRating;

    /**
     * @var mixed $riskStatus
     */
    #[JsonProperty('risk_status')]
    public mixed $riskStatus;

    /**
     * @var RetrieveAccountResponseFeatures $features
     */
    #[JsonProperty('features')]
    public RetrieveAccountResponseFeatures $features;

    /**
     * @var bool $ipAuthEnabled
     */
    #[JsonProperty('ip_auth_enabled')]
    public bool $ipAuthEnabled;

    /**
     * @var array<string, mixed> $ipWhitelistRules
     */
    #[JsonProperty('ip_whitelist_rules'), ArrayType(['string' => 'mixed'])]
    public array $ipWhitelistRules;

    /**
     * @var bool $allowAwsIps
     */
    #[JsonProperty('allow_aws_ips')]
    public bool $allowAwsIps;

    /**
     * @var string $role
     */
    #[JsonProperty('role')]
    public string $role;

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
     * @var string $lastLogin
     */
    #[JsonProperty('last_login')]
    public string $lastLogin;

    /**
     * @var string $pricingTierId
     */
    #[JsonProperty('pricing_tier_id')]
    public string $pricingTierId;

    /**
     * @var RetrieveAccountResponsePricingTier $pricingTier
     */
    #[JsonProperty('pricing_tier')]
    public RetrieveAccountResponsePricingTier $pricingTier;

    /**
     * @param array{
     *   type: string,
     *   id: string,
     *   apiId: string,
     *   name: string,
     *   email: string,
     *   phone: string,
     *   description: string,
     *   authId: string,
     *   authSecret: string,
     *   country: string,
     *   timezone: string,
     *   city: string,
     *   state: string,
     *   address: string,
     *   zipCode: string,
     *   company: string,
     *   accountType: string,
     *   postpaid: bool,
     *   autoRecharge: bool,
     *   enabled: bool,
     *   creditLimit: int,
     *   cpsLimit: int,
     *   concurrentCallsLimit: int,
     *   baseCpsLimit: int,
     *   baseConcurrentCallsLimit: int,
     *   purchasedCps: int,
     *   purchasedConcurrentCalls: int,
     *   riskRating: int,
     *   features: RetrieveAccountResponseFeatures,
     *   ipAuthEnabled: bool,
     *   ipWhitelistRules: array<string, mixed>,
     *   allowAwsIps: bool,
     *   role: string,
     *   isActive: bool,
     *   isVerified: bool,
     *   isTrialAccount: bool,
     *   createdAt: string,
     *   updatedAt: string,
     *   lastLogin: string,
     *   pricingTierId: string,
     *   pricingTier: RetrieveAccountResponsePricingTier,
     *   authTokenExpireTime?: mixed,
     *   autoRechargeConfig?: mixed,
     *   carrierType?: mixed,
     *   customerType?: mixed,
     *   riskStatus?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->apiId = $values['apiId'];
        $this->name = $values['name'];
        $this->email = $values['email'];
        $this->phone = $values['phone'];
        $this->description = $values['description'];
        $this->authId = $values['authId'];
        $this->authSecret = $values['authSecret'];
        $this->authTokenExpireTime = $values['authTokenExpireTime'] ?? null;
        $this->country = $values['country'];
        $this->timezone = $values['timezone'];
        $this->city = $values['city'];
        $this->state = $values['state'];
        $this->address = $values['address'];
        $this->zipCode = $values['zipCode'];
        $this->company = $values['company'];
        $this->accountType = $values['accountType'];
        $this->postpaid = $values['postpaid'];
        $this->autoRecharge = $values['autoRecharge'];
        $this->autoRechargeConfig = $values['autoRechargeConfig'] ?? null;
        $this->enabled = $values['enabled'];
        $this->carrierType = $values['carrierType'] ?? null;
        $this->customerType = $values['customerType'] ?? null;
        $this->creditLimit = $values['creditLimit'];
        $this->cpsLimit = $values['cpsLimit'];
        $this->concurrentCallsLimit = $values['concurrentCallsLimit'];
        $this->baseCpsLimit = $values['baseCpsLimit'];
        $this->baseConcurrentCallsLimit = $values['baseConcurrentCallsLimit'];
        $this->purchasedCps = $values['purchasedCps'];
        $this->purchasedConcurrentCalls = $values['purchasedConcurrentCalls'];
        $this->riskRating = $values['riskRating'];
        $this->riskStatus = $values['riskStatus'] ?? null;
        $this->features = $values['features'];
        $this->ipAuthEnabled = $values['ipAuthEnabled'];
        $this->ipWhitelistRules = $values['ipWhitelistRules'];
        $this->allowAwsIps = $values['allowAwsIps'];
        $this->role = $values['role'];
        $this->isActive = $values['isActive'];
        $this->isVerified = $values['isVerified'];
        $this->isTrialAccount = $values['isTrialAccount'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->lastLogin = $values['lastLogin'];
        $this->pricingTierId = $values['pricingTierId'];
        $this->pricingTier = $values['pricingTier'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
