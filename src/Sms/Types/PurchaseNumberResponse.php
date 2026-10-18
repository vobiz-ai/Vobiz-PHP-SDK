<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * The result of a successful purchase: the billing record and the routing record.
 */
class PurchaseNumberResponse extends JsonSerializableType
{
    /**
     * @var ?NumberPurchase $purchase The purchase record, with `status: purchased`, the amounts charged and `nextBillingAt`.
     */
    #[JsonProperty('purchase')]
    public ?NumberPurchase $purchase;

    /**
     * @var ?NumberRouting $number The routing record that connects the number to your account. The number appears in `GET /numbers` from this point.
     */
    #[JsonProperty('number')]
    public ?NumberRouting $number;

    /**
     * @param array{
     *   purchase?: ?NumberPurchase,
     *   number?: ?NumberRouting,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->purchase = $values['purchase'] ?? null;
        $this->number = $values['number'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
