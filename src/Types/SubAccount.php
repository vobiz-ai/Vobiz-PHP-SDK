<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

class SubAccount extends JsonSerializableType
{
    /**
     * @var ?string $authId
     */
    #[JsonProperty('auth_id')]
    public ?string $authId;

    /**
     * @var ?string $authToken
     */
    #[JsonProperty('auth_token')]
    public ?string $authToken;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?value-of<SubAccountKycMode> $kycMode Verification mode. `customer_use` sub-accounts must complete their own KYC before placing calls.
     */
    #[JsonProperty('kyc_mode')]
    public ?string $kycMode;

    /**
     * @var ?string $businessType Legal constitution of the customer (e.g. `private_limited`).
     */
    #[JsonProperty('business_type')]
    public ?string $businessType;

    /**
     * @var ?bool $kycCallsBlocked True while a `customer_use` sub-account has not yet completed the KYC required to place calls.
     */
    #[JsonProperty('kyc_calls_blocked')]
    public ?bool $kycCallsBlocked;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   authId?: ?string,
     *   authToken?: ?string,
     *   name?: ?string,
     *   enabled?: ?bool,
     *   kycMode?: ?value-of<SubAccountKycMode>,
     *   businessType?: ?string,
     *   kycCallsBlocked?: ?bool,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authId = $values['authId'] ?? null;
        $this->authToken = $values['authToken'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->kycMode = $values['kycMode'] ?? null;
        $this->businessType = $values['businessType'] ?? null;
        $this->kycCallsBlocked = $values['kycCallsBlocked'] ?? null;
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
