<?php

namespace Vobiz\SubAccountKycTestMode\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\SubAccountKycTestMode\Types\MockFinalizePendingKycRequestVerificationType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\SubAccountKycTestMode\Types\MockFinalizePendingKycRequestOutcome;

class MockFinalizePendingKycRequest extends JsonSerializableType
{
    /**
     * @var value-of<MockFinalizePendingKycRequestVerificationType> $verificationType
     */
    #[JsonProperty('verification_type')]
    public string $verificationType;

    /**
     * @var value-of<MockFinalizePendingKycRequestOutcome> $outcome
     */
    #[JsonProperty('outcome')]
    public string $outcome;

    /**
     * @param array{
     *   verificationType: value-of<MockFinalizePendingKycRequestVerificationType>,
     *   outcome: value-of<MockFinalizePendingKycRequestOutcome>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->verificationType = $values['verificationType'];
        $this->outcome = $values['outcome'];
    }
}
