<?php

namespace Vobiz\PhoneNumbers\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListInventoryNumbersResponseItemsItem extends JsonSerializableType
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
     * @var string $e164
     */
    #[JsonProperty('e164')]
    public string $e164;

    /**
     * @var string $country
     */
    #[JsonProperty('country')]
    public string $country;

    /**
     * @var ListInventoryNumbersResponseItemsItemCapabilities $capabilities
     */
    #[JsonProperty('capabilities')]
    public ListInventoryNumbersResponseItemsItemCapabilities $capabilities;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $provider
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var int $setupFee
     */
    #[JsonProperty('setup_fee')]
    public int $setupFee;

    /**
     * @var int $monthlyFee
     */
    #[JsonProperty('monthly_fee')]
    public int $monthlyFee;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var bool $voiceEnabled
     */
    #[JsonProperty('voice_enabled')]
    public bool $voiceEnabled;

    /**
     * @var mixed $tags
     */
    #[JsonProperty('tags')]
    public mixed $tags;

    /**
     * @var bool $isBlocked
     */
    #[JsonProperty('is_blocked')]
    public bool $isBlocked;

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
     * @var bool $isTrialNumber
     */
    #[JsonProperty('is_trial_number')]
    public bool $isTrialNumber;

    /**
     * @var int $minimumCommitmentMonths
     */
    #[JsonProperty('minimum_commitment_months')]
    public int $minimumCommitmentMonths;

    /**
     * @var bool $aadhaarVerificationRequired
     */
    #[JsonProperty('aadhaar_verification_required')]
    public bool $aadhaarVerificationRequired;

    /**
     * @var bool $aadhaarVerified
     */
    #[JsonProperty('aadhaar_verified')]
    public bool $aadhaarVerified;

    /**
     * @var ?string $region
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @param array{
     *   id: string,
     *   accountId: string,
     *   e164: string,
     *   country: string,
     *   capabilities: ListInventoryNumbersResponseItemsItemCapabilities,
     *   status: string,
     *   provider: string,
     *   setupFee: int,
     *   monthlyFee: int,
     *   currency: string,
     *   voiceEnabled: bool,
     *   isBlocked: bool,
     *   createdAt: string,
     *   updatedAt: string,
     *   isTrialNumber: bool,
     *   minimumCommitmentMonths: int,
     *   aadhaarVerificationRequired: bool,
     *   aadhaarVerified: bool,
     *   tags?: mixed,
     *   region?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->accountId = $values['accountId'];
        $this->e164 = $values['e164'];
        $this->country = $values['country'];
        $this->capabilities = $values['capabilities'];
        $this->status = $values['status'];
        $this->provider = $values['provider'];
        $this->setupFee = $values['setupFee'];
        $this->monthlyFee = $values['monthlyFee'];
        $this->currency = $values['currency'];
        $this->voiceEnabled = $values['voiceEnabled'];
        $this->tags = $values['tags'] ?? null;
        $this->isBlocked = $values['isBlocked'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->isTrialNumber = $values['isTrialNumber'];
        $this->minimumCommitmentMonths = $values['minimumCommitmentMonths'];
        $this->aadhaarVerificationRequired = $values['aadhaarVerificationRequired'];
        $this->aadhaarVerified = $values['aadhaarVerified'];
        $this->region = $values['region'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
