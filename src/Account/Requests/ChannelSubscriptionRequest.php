<?php

namespace Vobiz\Account\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Types\CapacityResourceType;
use Vobiz\Core\Json\JsonProperty;

class ChannelSubscriptionRequest extends JsonSerializableType
{
    /**
     * @var value-of<CapacityResourceType> $resourceType
     */
    #[JsonProperty('resource_type')]
    public string $resourceType;

    /**
     * @var int $quantity Capacity quantity to purchase. Pricing-tier block and quantity rules also apply.
     */
    #[JsonProperty('quantity')]
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
