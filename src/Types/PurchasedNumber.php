<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

class PurchasedNumber extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $authId
     */
    #[JsonProperty('auth_id')]
    public ?string $authId;

    /**
     * @var ?string $e164
     */
    #[JsonProperty('e164')]
    public ?string $e164;

    /**
     * @var ?string $country
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $region
     */
    #[JsonProperty('region')]
    public ?string $region;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?float $setupFee
     */
    #[JsonProperty('setup_fee')]
    public ?float $setupFee;

    /**
     * @var ?float $monthlyFee
     */
    #[JsonProperty('monthly_fee')]
    public ?float $monthlyFee;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?DateTime $purchasedAt
     */
    #[JsonProperty('purchased_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $purchasedAt;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updated_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   authId?: ?string,
     *   e164?: ?string,
     *   country?: ?string,
     *   region?: ?string,
     *   status?: ?string,
     *   provider?: ?string,
     *   setupFee?: ?float,
     *   monthlyFee?: ?float,
     *   currency?: ?string,
     *   purchasedAt?: ?DateTime,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->authId = $values['authId'] ?? null;
        $this->e164 = $values['e164'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->provider = $values['provider'] ?? null;
        $this->setupFee = $values['setupFee'] ?? null;
        $this->monthlyFee = $values['monthlyFee'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->purchasedAt = $values['purchasedAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
