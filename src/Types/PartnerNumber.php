<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * A DID phone number assigned to a customer account under the partner umbrella.
 */
class PartnerNumber extends JsonSerializableType
{
    /**
     * @var ?string $number
     */
    #[JsonProperty('number')]
    public ?string $number;

    /**
     * @var ?string $accountAuthId
     */
    #[JsonProperty('account_auth_id')]
    public ?string $accountAuthId;

    /**
     * @var ?string $accountName
     */
    #[JsonProperty('account_name')]
    public ?string $accountName;

    /**
     * @var ?string $numberType
     */
    #[JsonProperty('number_type')]
    public ?string $numberType;

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
     * @var ?value-of<PartnerNumberStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $applicationId
     */
    #[JsonProperty('application_id')]
    public ?string $applicationId;

    /**
     * @var ?string $applicationName
     */
    #[JsonProperty('application_name')]
    public ?string $applicationName;

    /**
     * @var ?string $trunkId
     */
    #[JsonProperty('trunk_id')]
    public ?string $trunkId;

    /**
     * @var ?float $monthlyCost
     */
    #[JsonProperty('monthly_cost')]
    public ?float $monthlyCost;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?DateTime $assignedAt
     */
    #[JsonProperty('assigned_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $assignedAt;

    /**
     * @var ?DateTime $expiresAt
     */
    #[JsonProperty('expires_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $expiresAt;

    /**
     * @param array{
     *   number?: ?string,
     *   accountAuthId?: ?string,
     *   accountName?: ?string,
     *   numberType?: ?string,
     *   country?: ?string,
     *   region?: ?string,
     *   status?: ?value-of<PartnerNumberStatus>,
     *   applicationId?: ?string,
     *   applicationName?: ?string,
     *   trunkId?: ?string,
     *   monthlyCost?: ?float,
     *   currency?: ?string,
     *   assignedAt?: ?DateTime,
     *   expiresAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->number = $values['number'] ?? null;
        $this->accountAuthId = $values['accountAuthId'] ?? null;
        $this->accountName = $values['accountName'] ?? null;
        $this->numberType = $values['numberType'] ?? null;
        $this->country = $values['country'] ?? null;
        $this->region = $values['region'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->applicationId = $values['applicationId'] ?? null;
        $this->applicationName = $values['applicationName'] ?? null;
        $this->trunkId = $values['trunkId'] ?? null;
        $this->monthlyCost = $values['monthlyCost'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->assignedAt = $values['assignedAt'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
