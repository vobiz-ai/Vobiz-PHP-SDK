<?php

namespace Vobiz\Account\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class RetrieveAccountResponsePricingTier extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var float $ratePerMinute
     */
    #[JsonProperty('rate_per_minute')]
    public float $ratePerMinute;

    /**
     * @var int $billingIncrementSeconds
     */
    #[JsonProperty('billing_increment_seconds')]
    public int $billingIncrementSeconds;

    /**
     * @var int $minimumDurationSeconds
     */
    #[JsonProperty('minimum_duration_seconds')]
    public int $minimumDurationSeconds;

    /**
     * @var bool $isActive
     */
    #[JsonProperty('is_active')]
    public bool $isActive;

    /**
     * @var bool $isDefault
     */
    #[JsonProperty('is_default')]
    public bool $isDefault;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   description: string,
     *   currency: string,
     *   ratePerMinute: float,
     *   billingIncrementSeconds: int,
     *   minimumDurationSeconds: int,
     *   isActive: bool,
     *   isDefault: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->description = $values['description'];
        $this->currency = $values['currency'];
        $this->ratePerMinute = $values['ratePerMinute'];
        $this->billingIncrementSeconds = $values['billingIncrementSeconds'];
        $this->minimumDurationSeconds = $values['minimumDurationSeconds'];
        $this->isActive = $values['isActive'];
        $this->isDefault = $values['isDefault'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
