<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class PhoneNumber extends JsonSerializableType
{
    /**
     * @var ?string $number
     */
    #[JsonProperty('number')]
    public ?string $number;

    /**
     * @var ?value-of<PhoneNumberNumberType> $numberType
     */
    #[JsonProperty('number_type')]
    public ?string $numberType;

    /**
     * @var ?string $country
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $monthlyRentalRate
     */
    #[JsonProperty('monthly_rental_rate')]
    public ?string $monthlyRentalRate;

    /**
     * @var ?value-of<PhoneNumberStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   number?: ?string,
     *   numberType?: ?value-of<PhoneNumberNumberType>,
     *   country?: ?string,
     *   monthlyRentalRate?: ?string,
     *   status?: ?value-of<PhoneNumberStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->number = $values['number'] ?? null;
        $this->numberType = $values['numberType'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->monthlyRentalRate = $values['monthlyRentalRate'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
