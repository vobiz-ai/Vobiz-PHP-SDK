<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * The result of releasing a number.
 */
class ReleaseNumberResponse extends JsonSerializableType
{
    /**
     * @var ?NumberPurchase $purchase The purchase record after release, with `status: released`, `releasedAt` set and `nextBillingAt` set to `null`.
     */
    #[JsonProperty('purchase')]
    public ?NumberPurchase $purchase;

    /**
     * @param array{
     *   purchase?: ?NumberPurchase,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->purchase = $values['purchase'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
