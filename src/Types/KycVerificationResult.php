<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Outcome of a single KYC verification step.
 */
class KycVerificationResult extends JsonSerializableType
{
    /**
     * @var value-of<KycVerificationResultVerificationType> $verificationType
     */
    #[JsonProperty('verification_type')]
    public string $verificationType;

    /**
     * @var value-of<KycVerificationResultStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?bool $kycCallsBlocked Recomputed sub-account call-blocking state after this verification.
     */
    #[JsonProperty('kyc_calls_blocked')]
    public ?bool $kycCallsBlocked;

    /**
     * @var ?bool $mock Present and `true` on responses from the test-mode endpoints.
     */
    #[JsonProperty('mock')]
    public ?bool $mock;

    /**
     * @param array{
     *   verificationType: value-of<KycVerificationResultVerificationType>,
     *   status: value-of<KycVerificationResultStatus>,
     *   kycCallsBlocked?: ?bool,
     *   mock?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->verificationType = $values['verificationType'];
        $this->status = $values['status'];
        $this->kycCallsBlocked = $values['kycCallsBlocked'] ?? null;
        $this->mock = $values['mock'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
