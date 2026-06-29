<?php

namespace Vobiz\PhoneNumbers\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListNumbersResponseItemsItem extends JsonSerializableType
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
     * @var string $region
     */
    #[JsonProperty('region')]
    public string $region;

    /**
     * @var ListNumbersResponseItemsItemCapabilities $capabilities
     */
    #[JsonProperty('capabilities')]
    public ListNumbersResponseItemsItemCapabilities $capabilities;

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
     * @var ?string $applicationId
     */
    #[JsonProperty('application_id')]
    public ?string $applicationId;

    /**
     * @var bool $voiceEnabled
     */
    #[JsonProperty('voice_enabled')]
    public bool $voiceEnabled;

    /**
     * @var array<string> $tags
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public array $tags;

    /**
     * @var string $purchasedAt
     */
    #[JsonProperty('purchased_at')]
    public string $purchasedAt;

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
     * @var ?string $lastBillingDate
     */
    #[JsonProperty('last_billing_date')]
    public ?string $lastBillingDate;

    /**
     * @var ?string $nextBillingDate
     */
    #[JsonProperty('next_billing_date')]
    public ?string $nextBillingDate;

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
     * @var string $source
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var ?string $releasedAt
     */
    #[JsonProperty('released_at')]
    public ?string $releasedAt;

    /**
     * @var ?string $trunkGroupId
     */
    #[JsonProperty('trunk_group_id')]
    public ?string $trunkGroupId;

    /**
     * @param array{
     *   id: string,
     *   accountId: string,
     *   e164: string,
     *   country: string,
     *   region: string,
     *   capabilities: ListNumbersResponseItemsItemCapabilities,
     *   status: string,
     *   provider: string,
     *   setupFee: int,
     *   monthlyFee: int,
     *   currency: string,
     *   voiceEnabled: bool,
     *   tags: array<string>,
     *   purchasedAt: string,
     *   isBlocked: bool,
     *   createdAt: string,
     *   updatedAt: string,
     *   isTrialNumber: bool,
     *   minimumCommitmentMonths: int,
     *   aadhaarVerificationRequired: bool,
     *   aadhaarVerified: bool,
     *   source: string,
     *   applicationId?: ?string,
     *   lastBillingDate?: ?string,
     *   nextBillingDate?: ?string,
     *   releasedAt?: ?string,
     *   trunkGroupId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->accountId = $values['accountId'];
        $this->e164 = $values['e164'];
        $this->country = $values['country'];
        $this->region = $values['region'];
        $this->capabilities = $values['capabilities'];
        $this->status = $values['status'];
        $this->provider = $values['provider'];
        $this->setupFee = $values['setupFee'];
        $this->monthlyFee = $values['monthlyFee'];
        $this->currency = $values['currency'];
        $this->applicationId = $values['applicationId'] ?? null;
        $this->voiceEnabled = $values['voiceEnabled'];
        $this->tags = $values['tags'];
        $this->purchasedAt = $values['purchasedAt'];
        $this->isBlocked = $values['isBlocked'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->isTrialNumber = $values['isTrialNumber'];
        $this->lastBillingDate = $values['lastBillingDate'] ?? null;
        $this->nextBillingDate = $values['nextBillingDate'] ?? null;
        $this->minimumCommitmentMonths = $values['minimumCommitmentMonths'];
        $this->aadhaarVerificationRequired = $values['aadhaarVerificationRequired'];
        $this->aadhaarVerified = $values['aadhaarVerified'];
        $this->source = $values['source'];
        $this->releasedAt = $values['releasedAt'] ?? null;
        $this->trunkGroupId = $values['trunkGroupId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
