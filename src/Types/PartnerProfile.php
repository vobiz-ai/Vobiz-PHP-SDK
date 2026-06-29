<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * Partner identity, balance, GST configuration, and permanent partner ID.
 */
class PartnerProfile extends JsonSerializableType
{
    /**
     * @var ?string $id Permanent partner ID - required as a filter parameter for Transaction and CDR queries.
     */
    #[JsonProperty('id')]
    public ?string $id;

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
     * @var ?string $phone
     */
    #[JsonProperty('phone')]
    public ?string $phone;

    /**
     * @var ?string $company
     */
    #[JsonProperty('company')]
    public ?string $company;

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
     * @var ?string $gstin
     */
    #[JsonProperty('gstin')]
    public ?string $gstin;

    /**
     * @var ?string $gstStatus
     */
    #[JsonProperty('gst_status')]
    public ?string $gstStatus;

    /**
     * @var ?bool $tdsApplicable
     */
    #[JsonProperty('tds_applicable')]
    public ?bool $tdsApplicable;

    /**
     * @var ?float $tdsPercentage
     */
    #[JsonProperty('tds_percentage')]
    public ?float $tdsPercentage;

    /**
     * @var ?string $accountType
     */
    #[JsonProperty('account_type')]
    public ?string $accountType;

    /**
     * @var ?string $status
     */
    #[JsonProperty('status')]
    public ?string $status;

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
     *   name?: ?string,
     *   email?: ?string,
     *   phone?: ?string,
     *   company?: ?string,
     *   balance?: ?float,
     *   currency?: ?string,
     *   gstin?: ?string,
     *   gstStatus?: ?string,
     *   tdsApplicable?: ?bool,
     *   tdsPercentage?: ?float,
     *   accountType?: ?string,
     *   status?: ?string,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->company = $values['company'] ?? null;
        $this->balance = $values['balance'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->gstin = $values['gstin'] ?? null;
        $this->gstStatus = $values['gstStatus'] ?? null;
        $this->tdsApplicable = $values['tdsApplicable'] ?? null;
        $this->tdsPercentage = $values['tdsPercentage'] ?? null;
        $this->accountType = $values['accountType'] ?? null;
        $this->status = $values['status'] ?? null;
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
