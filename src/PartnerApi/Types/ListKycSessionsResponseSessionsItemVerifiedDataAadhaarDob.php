<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListKycSessionsResponseSessionsItemVerifiedDataAadhaarDob extends JsonSerializableType
{
    /**
     * @var ?string $panType
     */
    #[JsonProperty('pan_type')]
    public ?string $panType;

    /**
     * @var ?string $panNumber
     */
    #[JsonProperty('pan_number')]
    public ?string $panNumber;

    /**
     * @var ?bool $panNameMatch
     */
    #[JsonProperty('pan_name_match')]
    public ?bool $panNameMatch;

    /**
     * @var ?array<string> $completedSteps
     */
    #[JsonProperty('completed_steps'), ArrayType(['string'])]
    public ?array $completedSteps;

    /**
     * @var ?string $panRegisteredName
     */
    #[JsonProperty('pan_registered_name')]
    public ?string $panRegisteredName;

    /**
     * @var ?string $gender
     */
    #[JsonProperty('gender')]
    public ?string $gender;

    /**
     * @var ?string $address
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?string $aadhaarDob
     */
    #[JsonProperty('aadhaar_dob')]
    public ?string $aadhaarDob;

    /**
     * @var ?string $aadhaarName
     */
    #[JsonProperty('aadhaar_name')]
    public ?string $aadhaarName;

    /**
     * @var ?string $maskedAadhaar
     */
    #[JsonProperty('masked_aadhaar')]
    public ?string $maskedAadhaar;

    /**
     * @var ?string $panName
     */
    #[JsonProperty('pan_name')]
    public ?string $panName;

    /**
     * @param array{
     *   panType?: ?string,
     *   panNumber?: ?string,
     *   panNameMatch?: ?bool,
     *   completedSteps?: ?array<string>,
     *   panRegisteredName?: ?string,
     *   gender?: ?string,
     *   address?: ?string,
     *   aadhaarDob?: ?string,
     *   aadhaarName?: ?string,
     *   maskedAadhaar?: ?string,
     *   panName?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->panType = $values['panType'] ?? null;
        $this->panNumber = $values['panNumber'] ?? null;
        $this->panNameMatch = $values['panNameMatch'] ?? null;
        $this->completedSteps = $values['completedSteps'] ?? null;
        $this->panRegisteredName = $values['panRegisteredName'] ?? null;
        $this->gender = $values['gender'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->aadhaarDob = $values['aadhaarDob'] ?? null;
        $this->aadhaarName = $values['aadhaarName'] ?? null;
        $this->maskedAadhaar = $values['maskedAadhaar'] ?? null;
        $this->panName = $values['panName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
