<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * A 10DLC or toll-free campaign on your account and its state at the US 10DLC registry. Optional fields are omitted when empty, and registry state is refreshed when you retrieve the campaign.
 */
class Campaign extends JsonSerializableType
{
    /**
     * @var ?string $id Campaign ID (UUID) on your account. Use it in every `/10dlc/campaigns/{id}` path.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $accountId Your Vobiz account ID (`MA_...`). Always the account whose credentials made the request.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?string $brandId ID of the brand the campaign runs under. Omitted for toll-free campaigns, which carry their business details themselves.
     */
    #[JsonProperty('brandId')]
    public ?string $brandId;

    /**
     * @var ?string $name Name you gave the campaign, for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?value-of<CampaignCampaignType> $campaignType Kind of campaign. `TEN_DIGIT_LONG_CODE` is a standard 10DLC campaign (the default on create) and `TOLL_FREE_UNIFIED_NUMBER` is a toll-free verification created with `POST /10dlc/campaigns/toll-free`. The other values are registry campaign types you can request on create.
     */
    #[JsonProperty('campaignType')]
    public ?string $campaignType;

    /**
     * @var ?string $stage Registry lifecycle stage. A new campaign is `DRAFT`; after you register it, it moves through review stages such as `SUBMITTED`, `IN_REVIEW` or `APPEALED` and settles at `REGISTERED` or `REJECTED`. Other values include `REGISTERED_PENDING_UPDATE`, `REGISTERED_PENDING_DEREGISTRATION`, `REJECTED_EXTERNALLY`, `DEREGISTERED`, `ARCHIVED`, `BLOCKED`, `SUSPENDED` and `DELETED`; treat it as an open string.
     */
    #[JsonProperty('stage')]
    public ?string $stage;

    /**
     * @var ?string $programSummary Description of the program as submitted to the registry. Omitted when not set.
     */
    #[JsonProperty('programSummary')]
    public ?string $programSummary;

    /**
     * @var ?string $confirmationMessage Opt-in confirmation message as submitted. Omitted when not set.
     */
    #[JsonProperty('confirmationMessage')]
    public ?string $confirmationMessage;

    /**
     * @var ?string $helpMessage HELP reply as submitted. Omitted when not set.
     */
    #[JsonProperty('helpMessage')]
    public ?string $helpMessage;

    /**
     * @var ?string $stopMessage STOP reply as submitted. Omitted when not set.
     */
    #[JsonProperty('stopMessage')]
    public ?string $stopMessage;

    /**
     * @var ?string $customerCarePhone Customer care phone number, in E.164 format. Omitted when not set.
     */
    #[JsonProperty('customerCarePhone')]
    public ?string $customerCarePhone;

    /**
     * @var ?string $customerCareEmail Customer care email address. Omitted when not set.
     */
    #[JsonProperty('customerCareEmail')]
    public ?string $customerCareEmail;

    /**
     * @var ?array<string> $exampleMessages Sample messages as submitted. Omitted when not set.
     */
    #[JsonProperty('exampleMessages'), ArrayType(['string'])]
    public ?array $exampleMessages;

    /**
     * @var ?string $termsAndConditionsUrl Public URL of your terms and conditions. Omitted when not set.
     */
    #[JsonProperty('termsAndConditionsUrl')]
    public ?string $termsAndConditionsUrl;

    /**
     * @var ?string $privacyPolicyUrl Public URL of your privacy policy. Omitted when not set.
     */
    #[JsonProperty('privacyPolicyUrl')]
    public ?string $privacyPolicyUrl;

    /**
     * @var ?array<string> $useCases Use-case codes as submitted, for example `ALERTS` or, on a toll-free campaign, `NOTIFICATIONS`. Omitted when not set.
     */
    #[JsonProperty('useCases'), ArrayType(['string'])]
    public ?array $useCases;

    /**
     * @var ?array<string> $messageTypes Message types as submitted, for example `SMS`. Omitted when not set.
     */
    #[JsonProperty('messageTypes'), ArrayType(['string'])]
    public ?array $messageTypes;

    /**
     * @var ?array<string, mixed> $optIns Opt-in details as submitted, keyed by channel (for example `web`). Omitted when not set.
     */
    #[JsonProperty('optIns'), ArrayType(['string' => 'mixed'])]
    public ?array $optIns;

    /**
     * @var ?bool $lowVolume Whether the campaign is declared low volume. Always present; `false` unless you set it.
     */
    #[JsonProperty('lowVolume')]
    public ?bool $lowVolume;

    /**
     * @var ?bool $ageGated Whether the content is restricted to adults. Always present; `false` unless you set it.
     */
    #[JsonProperty('ageGated')]
    public ?bool $ageGated;

    /**
     * @var ?bool $directLending Whether the content relates to direct lending. Always present; `false` unless you set it.
     */
    #[JsonProperty('directLending')]
    public ?bool $directLending;

    /**
     * @var ?bool $embeddedLink Whether messages contain URLs. Always present; `false` unless you set it.
     */
    #[JsonProperty('embeddedLink')]
    public ?bool $embeddedLink;

    /**
     * @var ?bool $embeddedPhone Whether messages contain phone numbers. Always present; `false` unless you set it.
     */
    #[JsonProperty('embeddedPhone')]
    public ?bool $embeddedPhone;

    /**
     * @var ?array<string> $numbers Numbers recorded on the campaign on your account. 10DLC campaigns store digits with country code (for example `14155550100`); toll-free campaigns store E.164 with a leading `+`. For the registry's own list use `GET /10dlc/campaigns/{id}/numbers`.
     */
    #[JsonProperty('numbers'), ArrayType(['string'])]
    public ?array $numbers;

    /**
     * @var ?array<string, mixed> $rejectionReasons The registry's review feedback after a rejection, with keys such as `rejectionDate`, `rejectionReasons` and `rejectionDetails` (each detail has `errorCode`, `description`, `recommendedAction` and `rejectionCategory`). Omitted when the campaign has no feedback; address every point before you appeal.
     */
    #[JsonProperty('rejectionReasons'), ArrayType(['string' => 'mixed'])]
    public ?array $rejectionReasons;

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
     *   brandId?: ?string,
     *   name?: ?string,
     *   campaignType?: ?value-of<CampaignCampaignType>,
     *   stage?: ?string,
     *   programSummary?: ?string,
     *   confirmationMessage?: ?string,
     *   helpMessage?: ?string,
     *   stopMessage?: ?string,
     *   customerCarePhone?: ?string,
     *   customerCareEmail?: ?string,
     *   exampleMessages?: ?array<string>,
     *   termsAndConditionsUrl?: ?string,
     *   privacyPolicyUrl?: ?string,
     *   useCases?: ?array<string>,
     *   messageTypes?: ?array<string>,
     *   optIns?: ?array<string, mixed>,
     *   lowVolume?: ?bool,
     *   ageGated?: ?bool,
     *   directLending?: ?bool,
     *   embeddedLink?: ?bool,
     *   embeddedPhone?: ?bool,
     *   numbers?: ?array<string>,
     *   rejectionReasons?: ?array<string, mixed>,
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
        $this->brandId = $values['brandId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->campaignType = $values['campaignType'] ?? null;
        $this->stage = $values['stage'] ?? null;
        $this->programSummary = $values['programSummary'] ?? null;
        $this->confirmationMessage = $values['confirmationMessage'] ?? null;
        $this->helpMessage = $values['helpMessage'] ?? null;
        $this->stopMessage = $values['stopMessage'] ?? null;
        $this->customerCarePhone = $values['customerCarePhone'] ?? null;
        $this->customerCareEmail = $values['customerCareEmail'] ?? null;
        $this->exampleMessages = $values['exampleMessages'] ?? null;
        $this->termsAndConditionsUrl = $values['termsAndConditionsUrl'] ?? null;
        $this->privacyPolicyUrl = $values['privacyPolicyUrl'] ?? null;
        $this->useCases = $values['useCases'] ?? null;
        $this->messageTypes = $values['messageTypes'] ?? null;
        $this->optIns = $values['optIns'] ?? null;
        $this->lowVolume = $values['lowVolume'] ?? null;
        $this->ageGated = $values['ageGated'] ?? null;
        $this->directLending = $values['directLending'] ?? null;
        $this->embeddedLink = $values['embeddedLink'] ?? null;
        $this->embeddedPhone = $values['embeddedPhone'] ?? null;
        $this->numbers = $values['numbers'] ?? null;
        $this->rejectionReasons = $values['rejectionReasons'] ?? null;
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
