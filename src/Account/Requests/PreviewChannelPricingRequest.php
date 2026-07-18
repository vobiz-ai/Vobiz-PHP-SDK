<?php

namespace Vobiz\Account\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Types\CapacityResourceType;

class PreviewChannelPricingRequest extends JsonSerializableType
{
    /**
     * @var value-of<CapacityResourceType> $resourceType Capacity type to price.
     */
    public string $resourceType;

    /**
     * @var int $quantity Capacity quantity to price. Pricing-tier block and quantity rules also apply.
     */
    public int $quantity;

    /**
     * @param array{
     *   resourceType: value-of<CapacityResourceType>,
     *   quantity: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->resourceType = $values['resourceType'];
        $this->quantity = $values['quantity'];
    }
}
