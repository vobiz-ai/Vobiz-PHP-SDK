<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * A number you bought through Vobiz, with its price, lifecycle status and billing history.
 */
class NumberPurchase extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier of the purchase (UUID).
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $accountId Auth ID of the account that owns the purchase, for example `MA_XXXXXXXX`.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?string $provider Internal routing identifier; do not rely on its value.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $e164 The purchased number in E.164 format. Use it as the path value of `POST /numbers/{e164}/release`.
     */
    #[JsonProperty('e164')]
    public ?string $e164;

    /**
     * @var ?string $countryCode ISO 3166-1 alpha-2 code of the number's country.
     */
    #[JsonProperty('countryCode')]
    public ?string $countryCode;

    /**
     * @var ?string $type Inventory type of the number in upper case, for example `VIRTUAL_LONG_NUMBER`.
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * @var ?array<string> $capabilities Upper-case capability labels for the number, for example `SMS`, `MMS` and `VOICE`.
     */
    #[JsonProperty('capabilities'), ArrayType(['string'])]
    public ?array $capabilities;

    /**
     * @var ?float $setupAmount One-time setup fee charged at purchase, in `currency`.
     */
    #[JsonProperty('setupAmount')]
    public ?float $setupAmount;

    /**
     * @var ?float $monthlyAmount Monthly rental for the number, in `currency`.
     */
    #[JsonProperty('monthlyAmount')]
    public ?float $monthlyAmount;

    /**
     * @var ?string $currency ISO 4217 code of the amounts, for example `USD`.
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?value-of<NumberPurchaseStatus> $status Lifecycle state: `pending` (created), `debited` (charged, purchase in progress), `purchased` (active and billing monthly), `past_due` (a renewal has been failing for more than 7 days), `failed` (did not complete), `refunded` (charge returned after a failed purchase) or `released` (you released it).
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?DateTime $purchasedAt When the number went live on your account (ISO 8601). `null` until the purchase completes.
     */
    #[JsonProperty('purchasedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $purchasedAt;

    /**
     * @var ?DateTime $nextBillingAt When the next monthly rental is charged (ISO 8601). `null` before the purchase completes and after release.
     */
    #[JsonProperty('nextBillingAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $nextBillingAt;

    /**
     * @var ?DateTime $releasedAt When you released the number (ISO 8601). `null` while the number is active.
     */
    #[JsonProperty('releasedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $releasedAt;

    /**
     * @var ?DateTime $createdAt When the purchase was started (ISO 8601).
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt When the purchase last changed, for example on renewal or release (ISO 8601).
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?array<NumberBillingCharge> $charges Wallet charges raised for this number, oldest first: the initial `purchase` charge and each monthly `rental`. `null` when none have been raised.
     */
    #[JsonProperty('charges'), ArrayType([NumberBillingCharge::class])]
    public ?array $charges;

    /**
     * @param array{
     *   id?: ?string,
     *   accountId?: ?string,
     *   provider?: ?string,
     *   e164?: ?string,
     *   countryCode?: ?string,
     *   type?: ?string,
     *   capabilities?: ?array<string>,
     *   setupAmount?: ?float,
     *   monthlyAmount?: ?float,
     *   currency?: ?string,
     *   status?: ?value-of<NumberPurchaseStatus>,
     *   purchasedAt?: ?DateTime,
     *   nextBillingAt?: ?DateTime,
     *   releasedAt?: ?DateTime,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     *   charges?: ?array<NumberBillingCharge>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->e164 = $values['e164'] ?? null;
        $this->countryCode = $values['countryCode'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->capabilities = $values['capabilities'] ?? null;
        $this->setupAmount = $values['setupAmount'] ?? null;
        $this->monthlyAmount = $values['monthlyAmount'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->purchasedAt = $values['purchasedAt'] ?? null;
        $this->nextBillingAt = $values['nextBillingAt'] ?? null;
        $this->releasedAt = $values['releasedAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->charges = $values['charges'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
