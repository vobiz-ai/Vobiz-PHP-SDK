<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ChannelPricingPreview extends JsonSerializableType
{
    /**
     * @var value-of<CapacityResourceType> $resourceType
     */
    #[JsonProperty('resource_type')]
    public string $resourceType;

    /**
     * @var int $quantity
     */
    #[JsonProperty('quantity')]
    public int $quantity;

    /**
     * @var string $monthlyCost Calculated monthly charge as a decimal string.
     */
    #[JsonProperty('monthly_cost')]
    public string $monthlyCost;

    /**
     * @var string $currency Currency assigned by the account's pricing tier.
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var array<array<string, mixed>> $breakdown Pricing-bracket calculation details when supplied by the pricing tier.
     */
    #[JsonProperty('breakdown'), ArrayType([['string' => 'mixed']])]
    public array $breakdown;

    /**
     * @param array{
     *   resourceType: value-of<CapacityResourceType>,
     *   quantity: int,
     *   monthlyCost: string,
     *   currency: string,
     *   breakdown: array<array<string, mixed>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->resourceType = $values['resourceType'];
        $this->quantity = $values['quantity'];
        $this->monthlyCost = $values['monthlyCost'];
        $this->currency = $values['currency'];
        $this->breakdown = $values['breakdown'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
