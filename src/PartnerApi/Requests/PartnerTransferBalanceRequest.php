<?php

namespace Vobiz\PartnerApi\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class PartnerTransferBalanceRequest extends JsonSerializableType
{
    /**
     * @var float $amount Positive decimal. Your master balance must be ≥ this amount.
     */
    #[JsonProperty('amount')]
    public float $amount;

    /**
     * @var string $currency Must match your partner account currency.
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var ?string $description Note for your records. Appears in both ledgers.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @param array{
     *   amount: float,
     *   currency: string,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amount = $values['amount'];
        $this->currency = $values['currency'];
        $this->description = $values['description'] ?? null;
    }
}
