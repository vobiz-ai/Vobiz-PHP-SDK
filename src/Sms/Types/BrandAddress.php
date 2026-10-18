<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Postal address of the business. Keys are passed to the US 10DLC registry as given, so you can add any address key the registry accepts.
 */
class BrandAddress extends JsonSerializableType
{
    /**
     * @var ?string $street Street address, including number and suite.
     */
    #[JsonProperty('street')]
    public ?string $street;

    /**
     * @var ?string $city City or locality.
     */
    #[JsonProperty('city')]
    public ?string $city;

    /**
     * @var ?string $state State, province or region; for US addresses, the two-letter state code (for example `CA`).
     */
    #[JsonProperty('state')]
    public ?string $state;

    /**
     * @var ?string $zipCode ZIP or postal code, as a string (for example `94105`).
     */
    #[JsonProperty('zipCode')]
    public ?string $zipCode;

    /**
     * @param array{
     *   street?: ?string,
     *   city?: ?string,
     *   state?: ?string,
     *   zipCode?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->street = $values['street'] ?? null;
        $this->city = $values['city'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->zipCode = $values['zipCode'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
