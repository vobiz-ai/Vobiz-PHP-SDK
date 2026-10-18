<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * One wallet charge raised for a purchased number: the initial purchase charge or a monthly renewal.
 */
class NumberBillingCharge extends JsonSerializableType
{
    /**
     * @var ?string $purchaseId `id` of the purchase this charge belongs to.
     */
    #[JsonProperty('purchaseId')]
    public ?string $purchaseId;

    /**
     * @var ?value-of<NumberBillingChargeKind> $kind `purchase` for the setup fee plus the first month, charged when you buy; `rental` for each later monthly renewal.
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?DateTime $periodStart Start of the billing period this charge covers (ISO 8601).
     */
    #[JsonProperty('periodStart'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $periodStart;

    /**
     * @var ?float $amount Amount charged, in `currency`. For `kind: purchase` this is the setup fee plus the first month.
     */
    #[JsonProperty('amount')]
    public ?float $amount;

    /**
     * @var ?string $currency ISO 4217 code of `amount`, for example `USD`.
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?value-of<NumberBillingChargeStatus> $status `pending` while the charge is waiting to be collected, `paid` once collected, `failed` when collection failed, `refunded` when the amount was returned to your wallet.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $reference Ledger reference for the charge, as it appears in your wallet transactions. Quote it to support when reconciling.
     */
    #[JsonProperty('reference')]
    public ?string $reference;

    /**
     * @var ?int $attempts How many times collection of this charge has been attempted. Values above `1` mean earlier attempts failed, typically for lack of balance.
     */
    #[JsonProperty('attempts')]
    public ?int $attempts;

    /**
     * @var ?DateTime $attemptedAt When collection was last attempted (ISO 8601).
     */
    #[JsonProperty('attemptedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $attemptedAt;

    /**
     * @param array{
     *   purchaseId?: ?string,
     *   kind?: ?value-of<NumberBillingChargeKind>,
     *   periodStart?: ?DateTime,
     *   amount?: ?float,
     *   currency?: ?string,
     *   status?: ?value-of<NumberBillingChargeStatus>,
     *   reference?: ?string,
     *   attempts?: ?int,
     *   attemptedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->purchaseId = $values['purchaseId'] ?? null;
        $this->kind = $values['kind'] ?? null;
        $this->periodStart = $values['periodStart'] ?? null;
        $this->amount = $values['amount'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->reference = $values['reference'] ?? null;
        $this->attempts = $values['attempts'] ?? null;
        $this->attemptedAt = $values['attemptedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
