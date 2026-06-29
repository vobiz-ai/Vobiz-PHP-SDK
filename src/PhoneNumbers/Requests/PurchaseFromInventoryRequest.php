<?php

namespace Vobiz\PhoneNumbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class PurchaseFromInventoryRequest extends JsonSerializableType
{
    /**
     * @var string $e164 Phone number to purchase in E.164 format.
     */
    #[JsonProperty('e164')]
    public string $e164;

    /**
     * @var ?string $currency Currency for transaction. Defaults to the number's currency or "USD".
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @param array{
     *   e164: string,
     *   currency?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->e164 = $values['e164'];
        $this->currency = $values['currency'] ?? null;
    }
}
