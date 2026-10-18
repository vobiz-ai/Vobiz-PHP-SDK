<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * Fields shared by campaign create and update requests. Values are passed to the US 10DLC registry as given, and reviewers check them against your brand and website.
 */
class CampaignFields extends JsonSerializableType
{
    /**
     * @var ?string $name Name for the campaign, for your reference. Required on create and on update.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $programSummary Plain-language description of the program: what you send, to whom, how often and how recipients opt in. Reviewers read this first.
     */
    #[JsonProperty('programSummary')]
    public ?string $programSummary;

    /**
     * @var ?string $confirmationMessage Message you send when a recipient opts in. Include your brand name and how to get help or opt out.
     */
    #[JsonProperty('confirmationMessage')]
    public ?string $confirmationMessage;

    /**
     * @var ?string $helpMessage Reply you send when a recipient texts HELP. Include your brand name and a way to reach support.
     */
    #[JsonProperty('helpMessage')]
    public ?string $helpMessage;

    /**
     * @var ?string $stopMessage Reply you send when a recipient texts STOP, confirming they will receive no further messages.
     */
    #[JsonProperty('stopMessage')]
    public ?string $stopMessage;

    /**
     * @var ?string $customerCarePhone Customer care phone number for the program, in E.164 format.
     */
    #[JsonProperty('customerCarePhone')]
    public ?string $customerCarePhone;

    /**
     * @var ?string $customerCareEmail Customer care email address for the program.
     */
    #[JsonProperty('customerCareEmail')]
    public ?string $customerCareEmail;

    /**
     * @var ?string $termsAndConditionsUrl Public URL of the terms and conditions that cover the program.
     */
    #[JsonProperty('termsAndConditionsUrl')]
    public ?string $termsAndConditionsUrl;

    /**
     * @var ?string $privacyPolicyUrl Public URL of your privacy policy.
     */
    #[JsonProperty('privacyPolicyUrl')]
    public ?string $privacyPolicyUrl;

    /**
     * @var ?array<string> $exampleMessages Sample messages exactly as the campaign will send them, including your brand name and opt-out language. Cover each use case you list.
     */
    #[JsonProperty('exampleMessages'), ArrayType(['string'])]
    public ?array $exampleMessages;

    /**
     * @var ?array<string> $useCases Use-case codes the campaign covers. Values accepted by the US 10DLC registry: `TWO_FACTOR_AUTH`, `ALERTS`, `FRAUD_ALERTS`, `CHAT`, `PROMOTIONAL_MARKETING`, `EDUCATION`, `DONATION`, `PUBLIC_SERVICE_ANNOUNCEMENT`, `VOTING_POLLING`, `POLITICAL`, `M2M`, `SWEEPSTAKE`.
     */
    #[JsonProperty('useCases'), ArrayType(['string'])]
    public ?array $useCases;

    /**
     * @var ?array<string> $messageTypes Message types the campaign sends, for example `SMS` and `MMS`.
     */
    #[JsonProperty('messageTypes'), ArrayType(['string'])]
    public ?array $messageTypes;

    /**
     * @var ?array<string, mixed> $optIns How recipients give consent, as an object keyed by opt-in channel (for example `web`, `keyword`, `paper`). Each entry describes that flow, for example `url` and `callToAction` for `web`; the object is passed to the registry as given.
     */
    #[JsonProperty('optIns'), ArrayType(['string' => 'mixed'])]
    public ?array $optIns;

    /**
     * @var ?bool $lowVolume Declares the campaign as low volume to the registry. Defaults to `false`.
     */
    #[JsonProperty('lowVolume')]
    public ?bool $lowVolume;

    /**
     * @var ?bool $ageGated Set `true` when the content is restricted to adults. Defaults to `false`.
     */
    #[JsonProperty('ageGated')]
    public ?bool $ageGated;

    /**
     * @var ?bool $directLending Set `true` when the content relates to direct lending or loan arrangements. Defaults to `false`.
     */
    #[JsonProperty('directLending')]
    public ?bool $directLending;

    /**
     * @var ?bool $embeddedLink Set `true` when messages contain URLs. Defaults to `false`.
     */
    #[JsonProperty('embeddedLink')]
    public ?bool $embeddedLink;

    /**
     * @var ?bool $embeddedPhone Set `true` when messages contain phone numbers. Defaults to `false`.
     */
    #[JsonProperty('embeddedPhone')]
    public ?bool $embeddedPhone;

    /**
     * @var ?array<string> $numbers Numbers on your account to attach to the campaign, as digits with country code and no `+` (for example `14155550100`).
     */
    #[JsonProperty('numbers'), ArrayType(['string'])]
    public ?array $numbers;

    /**
     * @var ?array<string> $supportingDocuments `documentId` values of supporting documents uploaded with `POST /10dlc/documents`. Every ID must be on your account, otherwise the request returns `400`.
     */
    #[JsonProperty('supportingDocuments'), ArrayType(['string'])]
    public ?array $supportingDocuments;

    /**
     * @var ?array<string> $mmsSampleFiles `documentId` values of MMS sample files uploaded with `POST /10dlc/documents`. Every ID must be on your account, otherwise the request returns `400`.
     */
    #[JsonProperty('mmsSampleFiles'), ArrayType(['string'])]
    public ?array $mmsSampleFiles;

    /**
     * @param array{
     *   name?: ?string,
     *   programSummary?: ?string,
     *   confirmationMessage?: ?string,
     *   helpMessage?: ?string,
     *   stopMessage?: ?string,
     *   customerCarePhone?: ?string,
     *   customerCareEmail?: ?string,
     *   termsAndConditionsUrl?: ?string,
     *   privacyPolicyUrl?: ?string,
     *   exampleMessages?: ?array<string>,
     *   useCases?: ?array<string>,
     *   messageTypes?: ?array<string>,
     *   optIns?: ?array<string, mixed>,
     *   lowVolume?: ?bool,
     *   ageGated?: ?bool,
     *   directLending?: ?bool,
     *   embeddedLink?: ?bool,
     *   embeddedPhone?: ?bool,
     *   numbers?: ?array<string>,
     *   supportingDocuments?: ?array<string>,
     *   mmsSampleFiles?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->programSummary = $values['programSummary'] ?? null;
        $this->confirmationMessage = $values['confirmationMessage'] ?? null;
        $this->helpMessage = $values['helpMessage'] ?? null;
        $this->stopMessage = $values['stopMessage'] ?? null;
        $this->customerCarePhone = $values['customerCarePhone'] ?? null;
        $this->customerCareEmail = $values['customerCareEmail'] ?? null;
        $this->termsAndConditionsUrl = $values['termsAndConditionsUrl'] ?? null;
        $this->privacyPolicyUrl = $values['privacyPolicyUrl'] ?? null;
        $this->exampleMessages = $values['exampleMessages'] ?? null;
        $this->useCases = $values['useCases'] ?? null;
        $this->messageTypes = $values['messageTypes'] ?? null;
        $this->optIns = $values['optIns'] ?? null;
        $this->lowVolume = $values['lowVolume'] ?? null;
        $this->ageGated = $values['ageGated'] ?? null;
        $this->directLending = $values['directLending'] ?? null;
        $this->embeddedLink = $values['embeddedLink'] ?? null;
        $this->embeddedPhone = $values['embeddedPhone'] ?? null;
        $this->numbers = $values['numbers'] ?? null;
        $this->supportingDocuments = $values['supportingDocuments'] ?? null;
        $this->mmsSampleFiles = $values['mmsSampleFiles'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
