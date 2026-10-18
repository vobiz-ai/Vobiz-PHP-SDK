<?php

namespace Vobiz\Sms\Campaigns\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use Vobiz\Sms\Types\BrandAddress;

class TollFreeCampaignRequest extends JsonSerializableType
{
    /**
     * @var ?string $referenceId Your own idempotency reference. Repeating a create with the same value reconciles to the same campaign instead of creating a second one.
     */
    #[JsonProperty('referenceId')]
    public ?string $referenceId;

    /**
     * @var string $name Name for the toll-free campaign, for your reference. Required (`400` with `invalid request: name is required` otherwise).
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $privacyPolicyUrl Public URL of your privacy policy.
     */
    #[JsonProperty('privacyPolicyUrl')]
    public ?string $privacyPolicyUrl;

    /**
     * @var ?string $termsAndConditionsUrl Public URL of the terms and conditions that cover the program.
     */
    #[JsonProperty('termsAndConditionsUrl')]
    public ?string $termsAndConditionsUrl;

    /**
     * @var ?string $messageVolume Expected monthly message volume. Values accepted by the US 10DLC registry: `HUNDRED`, `TEN_THOUSAND`, `TWO_HUNDRED_FIFTY_THOUSAND`, `SEVEN_HUNDRED_FIFTY_THOUSAND`, `FIVE_MILLION`.
     */
    #[JsonProperty('messageVolume')]
    public ?string $messageVolume;

    /**
     * @var ?array<string> $numbers Toll-free numbers on your account to verify, in E.164 format (for example `+18885550100`).
     */
    #[JsonProperty('numbers'), ArrayType(['string'])]
    public ?array $numbers;

    /**
     * @var ?array<string> $numberKeys Registry number keys of the numbers to verify, as an alternative to `numbers`.
     */
    #[JsonProperty('numberKeys'), ArrayType(['string'])]
    public ?array $numberKeys;

    /**
     * @var ?string $useCase Main use case of the program. Values accepted by the US 10DLC registry: `TWO_FACTOR_AUTH`, `NOTIFICATIONS`, `SYSTEM_ALERTS`, `APP_NOTIFICATIONS`, `BANKING`, `BOOKING_CONFIRMATIONS`, `CHATBOT`, `COURIER_SERVICES_DELIVERIES`, `EMERGENCY_ALERTS`, `EVENTS_PLANNING`, `FRAUD_ALERTS`, `GENERAL_MARKETING`, `HEALTHCARE`, `INSURANCE_SERVICES`, `LEGAL_SERVICES`, `MOTIVATIONAL_REMINDERS`, `POLITICAL`, `REAL_ESTATE_SERVICES`, `RELIGIOUS_SERVICES`, `REWARDS_PROGRAM`, `WEBINAR_REMINDERS`, `AUCTIONS`, `COVID_19_ALERTS`.
     */
    #[JsonProperty('useCase')]
    public ?string $useCase;

    /**
     * @var ?string $programSummary Plain-language description of the program: what you send, to whom, how often and how recipients opt in.
     */
    #[JsonProperty('programSummary')]
    public ?string $programSummary;

    /**
     * @var ?string $exampleMessage A sample message exactly as you will send it, including your brand name and opt-out language.
     */
    #[JsonProperty('exampleMessage')]
    public ?string $exampleMessage;

    /**
     * @var ?array<string, mixed> $optIns How recipients give consent, as an object keyed by opt-in channel (for example `web` with `url` and `callToAction`). Passed to the registry as given.
     */
    #[JsonProperty('optIns'), ArrayType(['string' => 'mixed'])]
    public ?array $optIns;

    /**
     * @var ?array<string> $optInImageUrLs Public URLs of screenshots or images that show the opt-in flow to the reviewer.
     */
    #[JsonProperty('optInImageURLs'), ArrayType(['string'])]
    public ?array $optInImageUrLs;

    /**
     * @var ?string $additionalInformation Anything else the reviewer should know about the program, in plain text.
     */
    #[JsonProperty('additionalInformation')]
    public ?string $additionalInformation;

    /**
     * @var ?string $countryCode ISO 3166-1 alpha-2 code of the country where the business is registered.
     */
    #[JsonProperty('countryCode')]
    public ?string $countryCode;

    /**
     * @var ?BrandAddress $address Postal address of the business as it appears on its registration records.
     */
    #[JsonProperty('address')]
    public ?BrandAddress $address;

    /**
     * @var ?string $supportPhone Support phone number for the business, in E.164 format.
     */
    #[JsonProperty('supportPhone')]
    public ?string $supportPhone;

    /**
     * @var ?string $supportEmail Support email address for the business.
     */
    #[JsonProperty('supportEmail')]
    public ?string $supportEmail;

    /**
     * @var ?string $businessContactFirstName First name of the person the reviewer can contact about the business.
     */
    #[JsonProperty('businessContactFirstName')]
    public ?string $businessContactFirstName;

    /**
     * @var ?string $businessContactLastName Last name of the person the reviewer can contact about the business.
     */
    #[JsonProperty('businessContactLastName')]
    public ?string $businessContactLastName;

    /**
     * @var ?string $legalName Registered legal name of the business, exactly as it appears on tax records.
     */
    #[JsonProperty('legalName')]
    public ?string $legalName;

    /**
     * @var ?string $businessDba Trading name ("doing business as") when it differs from `legalName`. Note the casing `businessDBA` on this endpoint, unlike `businessDba` on brands.
     */
    #[JsonProperty('businessDBA')]
    public ?string $businessDba;

    /**
     * @var ?string $businessName Business name customers know you by.
     */
    #[JsonProperty('businessName')]
    public ?string $businessName;

    /**
     * @var ?string $businessWebsite Business website. It must be live and match the business.
     */
    #[JsonProperty('businessWebsite')]
    public ?string $businessWebsite;

    /**
     * @var ?string $customerCareEmail Customer care email address for the program.
     */
    #[JsonProperty('customerCareEmail')]
    public ?string $customerCareEmail;

    /**
     * @var ?string $taxId Tax identifier of the business, for example the US EIN.
     */
    #[JsonProperty('taxId')]
    public ?string $taxId;

    /**
     * @var ?string $taxIdIssuingCountry ISO 3166-1 alpha-2 code of the country that issued `taxId`.
     */
    #[JsonProperty('taxIdIssuingCountry')]
    public ?string $taxIdIssuingCountry;

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
     * @var ?string $campaignVerifyToken Campaign Verify token for a US political program. Omit it for every other program.
     */
    #[JsonProperty('campaignVerifyToken')]
    public ?string $campaignVerifyToken;

    /**
     * @var ?string $priorityId ID (UUID) of a priority option from `GET /10dlc/campaigns/priorities`. A value that is not a UUID returns `400`; omit it when the list is empty.
     */
    #[JsonProperty('priorityId')]
    public ?string $priorityId;

    /**
     * @param array{
     *   name: string,
     *   referenceId?: ?string,
     *   privacyPolicyUrl?: ?string,
     *   termsAndConditionsUrl?: ?string,
     *   messageVolume?: ?string,
     *   numbers?: ?array<string>,
     *   numberKeys?: ?array<string>,
     *   useCase?: ?string,
     *   programSummary?: ?string,
     *   exampleMessage?: ?string,
     *   optIns?: ?array<string, mixed>,
     *   optInImageUrLs?: ?array<string>,
     *   additionalInformation?: ?string,
     *   countryCode?: ?string,
     *   address?: ?BrandAddress,
     *   supportPhone?: ?string,
     *   supportEmail?: ?string,
     *   businessContactFirstName?: ?string,
     *   businessContactLastName?: ?string,
     *   legalName?: ?string,
     *   businessDba?: ?string,
     *   businessName?: ?string,
     *   businessWebsite?: ?string,
     *   customerCareEmail?: ?string,
     *   taxId?: ?string,
     *   taxIdIssuingCountry?: ?string,
     *   legalEntityType?: ?string,
     *   businessRegistrationType?: ?string,
     *   campaignVerifyToken?: ?string,
     *   priorityId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->referenceId = $values['referenceId'] ?? null;
        $this->name = $values['name'];
        $this->privacyPolicyUrl = $values['privacyPolicyUrl'] ?? null;
        $this->termsAndConditionsUrl = $values['termsAndConditionsUrl'] ?? null;
        $this->messageVolume = $values['messageVolume'] ?? null;
        $this->numbers = $values['numbers'] ?? null;
        $this->numberKeys = $values['numberKeys'] ?? null;
        $this->useCase = $values['useCase'] ?? null;
        $this->programSummary = $values['programSummary'] ?? null;
        $this->exampleMessage = $values['exampleMessage'] ?? null;
        $this->optIns = $values['optIns'] ?? null;
        $this->optInImageUrLs = $values['optInImageUrLs'] ?? null;
        $this->additionalInformation = $values['additionalInformation'] ?? null;
        $this->countryCode = $values['countryCode'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->supportPhone = $values['supportPhone'] ?? null;
        $this->supportEmail = $values['supportEmail'] ?? null;
        $this->businessContactFirstName = $values['businessContactFirstName'] ?? null;
        $this->businessContactLastName = $values['businessContactLastName'] ?? null;
        $this->legalName = $values['legalName'] ?? null;
        $this->businessDba = $values['businessDba'] ?? null;
        $this->businessName = $values['businessName'] ?? null;
        $this->businessWebsite = $values['businessWebsite'] ?? null;
        $this->customerCareEmail = $values['customerCareEmail'] ?? null;
        $this->taxId = $values['taxId'] ?? null;
        $this->taxIdIssuingCountry = $values['taxIdIssuingCountry'] ?? null;
        $this->legalEntityType = $values['legalEntityType'] ?? null;
        $this->businessRegistrationType = $values['businessRegistrationType'] ?? null;
        $this->campaignVerifyToken = $values['campaignVerifyToken'] ?? null;
        $this->priorityId = $values['priorityId'] ?? null;
    }
}
