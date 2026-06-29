<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

class InventoryNumber extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

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
     *   e164?: ?string,
     *   country?: ?string,
     *   region?: ?string,
     *   status?: ?string,
     *   setupFee?: ?float,
     *   monthlyFee?: ?float,
     *   currency?: ?string,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->e164 = $values['e164'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->setupFee = $values['setupFee'] ?? null;
        $this->monthlyFee = $values['monthlyFee'] ?? null;
        $this->currency = $values['currency'] ?? null;
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
