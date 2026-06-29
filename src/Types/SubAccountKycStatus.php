<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * Aggregated KYC state for a sub-account.
 */
class SubAccountKycStatus extends JsonSerializableType
{
    /**
     * @var ?string $subAccountId
     */
    #[JsonProperty('sub_account_id')]
    public ?string $subAccountId;

    /**
     * @var ?value-of<SubAccountKycStatusKycMode> $kycMode
     */
    #[JsonProperty('kyc_mode')]
    public ?string $kycMode;

    /**
     * @var ?string $businessType
     */
    #[JsonProperty('business_type')]
    public ?string $businessType;

    /**
     * @var ?value-of<SubAccountKycStatusOverallStatus> $overallStatus
     */
    #[JsonProperty('overall_status')]
    public ?string $overallStatus;

    /**
     * @var ?bool $kycCallsBlocked True while the sub-account still needs KYC before it can place calls.
     */
    #[JsonProperty('kyc_calls_blocked')]
    public ?bool $kycCallsBlocked;

    /**
     * @var ?array<string, value-of<SubAccountKycStatusVerificationsValue>> $verifications Per-document state keyed by verification type.
     */
    #[JsonProperty('verifications'), ArrayType(['string' => 'string'])]
    public ?array $verifications;

    /**
     * @param array{
     *   subAccountId?: ?string,
     *   kycMode?: ?value-of<SubAccountKycStatusKycMode>,
     *   businessType?: ?string,
     *   overallStatus?: ?value-of<SubAccountKycStatusOverallStatus>,
     *   kycCallsBlocked?: ?bool,
     *   verifications?: ?array<string, value-of<SubAccountKycStatusVerificationsValue>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->subAccountId = $values['subAccountId'] ?? null;
        $this->kycMode = $values['kycMode'] ?? null;
        $this->businessType = $values['businessType'] ?? null;
        $this->overallStatus = $values['overallStatus'] ?? null;
        $this->kycCallsBlocked = $values['kycCallsBlocked'] ?? null;
        $this->verifications = $values['verifications'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
