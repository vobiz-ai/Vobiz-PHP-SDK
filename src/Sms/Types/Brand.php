<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * A brand on your account: the business behind your 10DLC traffic and its state at the US 10DLC registry. Optional fields are omitted when empty, and registry state is refreshed when you retrieve the brand.
 */
class Brand extends JsonSerializableType
{
    /**
     * @var ?string $id Brand ID (UUID) on your account. Use it in every `/10dlc/brands/{id}` path and as `brandId` when you create a campaign.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $accountId Your Vobiz account ID (`MA_...`). Always the account whose credentials made the request.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?string $name Display name you gave the brand when you created it.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $legalName Registered legal name of the business. Omitted when not set.
     */
    #[JsonProperty('legalName')]
    public ?string $legalName;

    /**
     * @var ?value-of<BrandBrandType> $brandType Kind of business behind the brand: `TENDLC_PRIVATE_COMPANY` (privately held business), `TENDLC_PUBLIC_COMPANY` (publicly traded company; also goes through brand authentication), `TENDLC_NON_PROFIT` (registered non-profit), `TENDLC_GOVERNMENT` (government body) or `TOLL_FREE_NUMBER` (a business registered for toll-free messaging).
     */
    #[JsonProperty('brandType')]
    public ?string $brandType;

    /**
     * @var ?value-of<BrandStage> $stage Where the brand is in your workflow: `DRAFT` until you call `POST /10dlc/brands/{id}/register`, then `SUBMITTED`.
     */
    #[JsonProperty('stage')]
    public ?string $stage;

    /**
     * @var ?value-of<BrandRegistrationStatus> $registrationStatus The registrar's decision, present once the brand is submitted. `PENDING` while under review, `PENDING_2FA` while a public company's business contact completes brand authentication, `PENDING_APPEAL` while an appeal is reviewed, `ACTIVE` when approved and `REJECTED` when declined (see `rejectionReasons`).
     */
    #[JsonProperty('registrationStatus')]
    public ?string $registrationStatus;

    /**
     * @var ?string $brandIdentityStatus Identity verification result from the registry, for example `VERIFIED`, `UNVERIFIED` or `VETTED_VERIFIED`. Omitted until the registry reports one.
     */
    #[JsonProperty('brandIdentityStatus')]
    public ?string $brandIdentityStatus;

    /**
     * @var ?array<BrandRejectionReason> $rejectionReasons Rejections recorded by registrars, one entry per registrar. Omitted when there are none; fix the brand with `PUT /10dlc/brands/{id}` and register it again.
     */
    #[JsonProperty('rejectionReasons'), ArrayType([BrandRejectionReason::class])]
    public ?array $rejectionReasons;

    /**
     * @var ?string $website Business website as submitted to the registry. Omitted when not set.
     */
    #[JsonProperty('website')]
    public ?string $website;

    /**
     * @var ?string $supportEmail Support email address for the business. Omitted when not set.
     */
    #[JsonProperty('supportEmail')]
    public ?string $supportEmail;

    /**
     * @var ?string $supportPhone Support phone number for the business, in E.164 format. Omitted when not set.
     */
    #[JsonProperty('supportPhone')]
    public ?string $supportPhone;

    /**
     * @var ?string $vertical Industry vertical code as submitted to the registry, for example `TECHNOLOGY`. Omitted when not set.
     */
    #[JsonProperty('vertical')]
    public ?string $vertical;

    /**
     * @var ?string $taxId Tax identifier of the business, for example a US EIN. Omitted when not set.
     */
    #[JsonProperty('taxId')]
    public ?string $taxId;

    /**
     * @var ?string $taxIdIssuingCountry ISO 3166-1 alpha-2 code of the country that issued `taxId`, for example `US`. Omitted when not set.
     */
    #[JsonProperty('taxIdIssuingCountry')]
    public ?string $taxIdIssuingCountry;

    /**
     * @var ?string $countryCode ISO 3166-1 alpha-2 code of the country where the business is registered. Omitted when not set.
     */
    #[JsonProperty('countryCode')]
    public ?string $countryCode;

    /**
     * @var ?BrandAddress $address Postal address of the business as submitted to the registry. Omitted when not set.
     */
    #[JsonProperty('address')]
    public ?BrandAddress $address;

    /**
     * @var ?array<string, mixed> $alternateBusinessId Alternate business identifier (for example a DUNS or LEI record), returned as you sent it. Omitted when not set.
     */
    #[JsonProperty('alternateBusinessId'), ArrayType(['string' => 'mixed'])]
    public ?array $alternateBusinessId;

    /**
     * @var ?string $businessContactFirstName First name of the business contact the registry can reach. Omitted when not set.
     */
    #[JsonProperty('businessContactFirstName')]
    public ?string $businessContactFirstName;

    /**
     * @var ?string $businessContactLastName Last name of the business contact the registry can reach. Omitted when not set.
     */
    #[JsonProperty('businessContactLastName')]
    public ?string $businessContactLastName;

    /**
     * @var ?string $businessContactEmail Email address of the business contact; brand-authentication and 2FA requests go here. Omitted when not set.
     */
    #[JsonProperty('businessContactEmail')]
    public ?string $businessContactEmail;

    /**
     * @var ?string $businessDba Trading name ("doing business as") when it differs from `legalName`. Omitted when not set.
     */
    #[JsonProperty('businessDba')]
    public ?string $businessDba;

    /**
     * @var ?string $legalEntityType Legal entity type as submitted to the registry, for example `PRIVATE_COMPANY`. Omitted when not set.
     */
    #[JsonProperty('legalEntityType')]
    public ?string $legalEntityType;

    /**
     * @var ?string $businessRegistrationType Type of business registration number for a business outside the US, for example `VAT`. Omitted when not set.
     */
    #[JsonProperty('businessRegistrationType')]
    public ?string $businessRegistrationType;

    /**
     * @var ?string $stockExchange Exchange where a `TENDLC_PUBLIC_COMPANY` brand is listed. Omitted when not set.
     */
    #[JsonProperty('stockExchange')]
    public ?string $stockExchange;

    /**
     * @var ?string $stockSymbol Ticker symbol of a `TENDLC_PUBLIC_COMPANY` brand. Omitted when not set.
     */
    #[JsonProperty('stockSymbol')]
    public ?string $stockSymbol;

    /**
     * @var ?string $taxExemptStatus Tax-exempt status of a `TENDLC_NON_PROFIT` brand. Omitted when not set.
     */
    #[JsonProperty('taxExemptStatus')]
    public ?string $taxExemptStatus;

    /**
     * @var ?DateTime $lastSyncedAt When Vobiz last refreshed this record from the US 10DLC registry, in ISO 8601 (RFC 3339) UTC. Omitted until the first refresh.
     */
    #[JsonProperty('lastSyncedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastSyncedAt;

    /**
     * @var ?DateTime $createdAt When the record was created on your account, in ISO 8601 (RFC 3339) UTC.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt When the record last changed on your account, in ISO 8601 (RFC 3339) UTC.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   accountId?: ?string,
     *   name?: ?string,
     *   legalName?: ?string,
     *   brandType?: ?value-of<BrandBrandType>,
     *   stage?: ?value-of<BrandStage>,
     *   registrationStatus?: ?value-of<BrandRegistrationStatus>,
     *   brandIdentityStatus?: ?string,
     *   rejectionReasons?: ?array<BrandRejectionReason>,
     *   website?: ?string,
     *   supportEmail?: ?string,
     *   supportPhone?: ?string,
     *   vertical?: ?string,
     *   taxId?: ?string,
     *   taxIdIssuingCountry?: ?string,
     *   countryCode?: ?string,
     *   address?: ?BrandAddress,
     *   alternateBusinessId?: ?array<string, mixed>,
     *   businessContactFirstName?: ?string,
     *   businessContactLastName?: ?string,
     *   businessContactEmail?: ?string,
     *   businessDba?: ?string,
     *   legalEntityType?: ?string,
     *   businessRegistrationType?: ?string,
     *   stockExchange?: ?string,
     *   stockSymbol?: ?string,
     *   taxExemptStatus?: ?string,
     *   lastSyncedAt?: ?DateTime,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->legalName = $values['legalName'] ?? null;
        $this->brandType = $values['brandType'] ?? null;
        $this->stage = $values['stage'] ?? null;
        $this->registrationStatus = $values['registrationStatus'] ?? null;
        $this->brandIdentityStatus = $values['brandIdentityStatus'] ?? null;
        $this->rejectionReasons = $values['rejectionReasons'] ?? null;
        $this->website = $values['website'] ?? null;
        $this->supportEmail = $values['supportEmail'] ?? null;
        $this->supportPhone = $values['supportPhone'] ?? null;
        $this->vertical = $values['vertical'] ?? null;
        $this->taxId = $values['taxId'] ?? null;
        $this->taxIdIssuingCountry = $values['taxIdIssuingCountry'] ?? null;
        $this->countryCode = $values['countryCode'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->alternateBusinessId = $values['alternateBusinessId'] ?? null;
        $this->businessContactFirstName = $values['businessContactFirstName'] ?? null;
        $this->businessContactLastName = $values['businessContactLastName'] ?? null;
        $this->businessContactEmail = $values['businessContactEmail'] ?? null;
        $this->businessDba = $values['businessDba'] ?? null;
        $this->legalEntityType = $values['legalEntityType'] ?? null;
        $this->businessRegistrationType = $values['businessRegistrationType'] ?? null;
        $this->stockExchange = $values['stockExchange'] ?? null;
        $this->stockSymbol = $values['stockSymbol'] ?? null;
        $this->taxExemptStatus = $values['taxExemptStatus'] ?? null;
        $this->lastSyncedAt = $values['lastSyncedAt'] ?? null;
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
