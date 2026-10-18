<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * The business that will send messages. `name` and `brandType` are required; every other value is passed to the US 10DLC registry as given, so use the values the registry accepts (listed per field) and match your official records.
 */
class CreateBrandRequest extends JsonSerializableType
{
    /**
     * @var ?string $referenceId Your own idempotency reference, any string unique per brand on your account. Repeating a create with the same value reconciles to the same brand instead of creating a second one. Ignored on update.
     */
    #[JsonProperty('referenceId')]
    public ?string $referenceId;

    /**
     * @var string $name Display name of the brand, usually the name customers know you by. Required.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $legalName Registered legal name of the business, exactly as it appears on tax records.
     */
    #[JsonProperty('legalName')]
    public ?string $legalName;

    /**
     * @var value-of<CreateBrandRequestBrandType> $brandType Kind of business. Required. One of `TENDLC_PRIVATE_COMPANY` (privately held business), `TENDLC_PUBLIC_COMPANY` (publicly traded company; also goes through brand authentication), `TENDLC_NON_PROFIT` (registered non-profit), `TENDLC_GOVERNMENT` (government body) or `TOLL_FREE_NUMBER` (a business registered for toll-free messaging).
     */
    #[JsonProperty('brandType')]
    public string $brandType;

    /**
     * @var ?string $website Business website. It must be live, match the business and show your privacy policy.
     */
    #[JsonProperty('website')]
    public ?string $website;

    /**
     * @var ?string $supportEmail Support email address for the business, ideally on the website's domain.
     */
    #[JsonProperty('supportEmail')]
    public ?string $supportEmail;

    /**
     * @var ?string $supportPhone Support phone number for the business, in E.164 format (for example `+14155550100`).
     */
    #[JsonProperty('supportPhone')]
    public ?string $supportPhone;

    /**
     * @var ?string $vertical Industry of the business. Values accepted by the US 10DLC registry include `AGRICULTURE`, `COMMUNICATION`, `CONSTRUCTION`, `EDUCATION`, `ENERGY`, `ENTERTAINMENT`, `FINANCIAL`, `GAMBLING`, `GOVERNMENT`, `HEALTHCARE`, `HOSPITALITY`, `HUMAN_RESOURCES`, `INFORMATION_TECHNOLOGY_SERVICES`, `INSURANCE`, `LEGAL`, `MANUFACTURING`, `NGO`, `POLITICAL`, `POSTAL`, `PROFESSIONAL`, `REAL_ESTATE`, `RETAIL`, `TECHNOLOGY`, `TRANSPORTATION`.
     */
    #[JsonProperty('vertical')]
    public ?string $vertical;

    /**
     * @var ?string $taxId Tax identifier of the business, for example the 9-digit US EIN. It must match `legalName` in the issuing country's records.
     */
    #[JsonProperty('taxId')]
    public ?string $taxId;

    /**
     * @var ?string $taxIdIssuingCountry ISO 3166-1 alpha-2 code of the country that issued `taxId`, for example `US`.
     */
    #[JsonProperty('taxIdIssuingCountry')]
    public ?string $taxIdIssuingCountry;

    /**
     * @var ?string $countryCode ISO 3166-1 alpha-2 code of the country where the business is registered, for example `US`.
     */
    #[JsonProperty('countryCode')]
    public ?string $countryCode;

    /**
     * @var ?BrandAddress $address Postal address of the business as it appears on its registration records.
     */
    #[JsonProperty('address')]
    public ?BrandAddress $address;

    /**
     * @var ?array<string, mixed> $alternateBusinessId Alternate business identifier (for example a DUNS or LEI record), passed to the registry as given. Send it only when the registry asks for one.
     */
    #[JsonProperty('alternateBusinessId'), ArrayType(['string' => 'mixed'])]
    public ?array $alternateBusinessId;

    /**
     * @var ?string $businessContactFirstName First name of the person the registry can contact about the brand.
     */
    #[JsonProperty('businessContactFirstName')]
    public ?string $businessContactFirstName;

    /**
     * @var ?string $businessContactLastName Last name of the person the registry can contact about the brand.
     */
    #[JsonProperty('businessContactLastName')]
    public ?string $businessContactLastName;

    /**
     * @var ?string $businessContactEmail Email address of the business contact. The registry sends brand-authentication and 2FA requests for `TENDLC_PUBLIC_COMPANY` brands here.
     */
    #[JsonProperty('businessContactEmail')]
    public ?string $businessContactEmail;

    /**
     * @var ?string $businessDba Trading name ("doing business as") when it differs from `legalName`. Note the casing `businessDba` on brand requests.
     */
    #[JsonProperty('businessDba')]
    public ?string $businessDba;

    /**
     * @var ?string $legalEntityType Legal form of the business. Values accepted by the US 10DLC registry: `PRIVATE_COMPANY`, `PUBLIC_COMPANY`, `NON_PROFIT`, `GOVERNMENT`, `SOLE_PROPRIETOR`.
     */
    #[JsonProperty('legalEntityType')]
    public ?string $legalEntityType;

    /**
     * @var ?string $businessRegistrationType Type of registration number for a business outside the US. Values accepted by the US 10DLC registry: `VAT`, `CBN`, `PROVINCIAL_NUMBER`, `ABN`, `SIREN`, `NZBN`, `CIF`, `CNPJ`, `OTHER`.
     */
    #[JsonProperty('businessRegistrationType')]
    public ?string $businessRegistrationType;

    /**
     * @var ?string $taxExemptStatus Tax-exempt status of a `TENDLC_NON_PROFIT` brand.
     */
    #[JsonProperty('taxExemptStatus')]
    public ?string $taxExemptStatus;

    /**
     * @var ?string $stockExchange Exchange where the company is listed, for example `NASDAQ` or `NYSE`. `TENDLC_PUBLIC_COMPANY` brands only.
     */
    #[JsonProperty('stockExchange')]
    public ?string $stockExchange;

    /**
     * @var ?string $stockSymbol Ticker symbol on `stockExchange`. `TENDLC_PUBLIC_COMPANY` brands only.
     */
    #[JsonProperty('stockSymbol')]
    public ?string $stockSymbol;

    /**
     * @param array{
     *   name: string,
     *   brandType: value-of<CreateBrandRequestBrandType>,
     *   referenceId?: ?string,
     *   legalName?: ?string,
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
     *   taxExemptStatus?: ?string,
     *   stockExchange?: ?string,
     *   stockSymbol?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->referenceId = $values['referenceId'] ?? null;
        $this->name = $values['name'];
        $this->legalName = $values['legalName'] ?? null;
        $this->brandType = $values['brandType'];
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
        $this->taxExemptStatus = $values['taxExemptStatus'] ?? null;
        $this->stockExchange = $values['stockExchange'] ?? null;
        $this->stockSymbol = $values['stockSymbol'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
