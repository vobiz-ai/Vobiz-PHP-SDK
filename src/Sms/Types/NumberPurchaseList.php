<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * The numbers you have bought, with their billing history.
 */
class NumberPurchaseList extends JsonSerializableType
{
    /**
     * @var ?array<NumberPurchase> $purchases Your purchases, newest first, including released numbers. Empty array when you have never bought a number.
     */
    #[JsonProperty('purchases'), ArrayType([NumberPurchase::class])]
    public ?array $purchases;

    /**
     * @param array{
     *   purchases?: ?array<NumberPurchase>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->purchases = $values['purchases'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
