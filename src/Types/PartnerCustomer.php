<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * A SIP-enabled customer sub-account under your partner umbrella.
 */
class PartnerCustomer extends JsonSerializableType
{
    /**
     * @var ?string $authId Permanent customer identifier - primary key for balance transfers, CDR lookups, transaction queries, and number assignments.
     */
    #[JsonProperty('auth_id')]
    public ?string $authId;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?value-of<PartnerCustomerStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?float $balance
     */
    #[JsonProperty('balance')]
    public ?float $balance;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?string $country
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    public ?string $timezone;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   authId?: ?string,
     *   name?: ?string,
     *   email?: ?string,
     *   status?: ?value-of<PartnerCustomerStatus>,
     *   balance?: ?float,
     *   currency?: ?string,
     *   country?: ?string,
     *   timezone?: ?string,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authId = $values['authId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->balance = $values['balance'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
