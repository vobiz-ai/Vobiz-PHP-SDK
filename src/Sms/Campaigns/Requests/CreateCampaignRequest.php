<?php

namespace Vobiz\Sms\Campaigns\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Traits\CampaignFields;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Sms\Campaigns\Types\CreateCampaignRequestCampaignType;

class CreateCampaignRequest extends JsonSerializableType
{
    use CampaignFields;

    /**
     * @var ?string $referenceId Your own idempotency reference. Repeating a create with the same value reconciles to the same campaign instead of creating a second one. Ignored on update.
     */
    #[JsonProperty('referenceId')]
    public ?string $referenceId;

    /**
     * @var string $brandId Required. ID of the brand from `POST /10dlc/brands` that runs this campaign. A missing, unknown or non-UUID value returns `404` with `{"error":"brand not found"}`.
     */
    #[JsonProperty('brandId')]
    public string $brandId;

    /**
     * @var ?value-of<CreateCampaignRequestCampaignType> $campaignType Kind of campaign. Defaults to `TEN_DIGIT_LONG_CODE`, the standard 10DLC campaign. Toll-free types return `400`; use `POST /10dlc/campaigns/toll-free` for those.
     */
    #[JsonProperty('campaignType')]
    public ?string $campaignType;

    /**
     * @param array{
     *   brandId: string,
     *   referenceId?: ?string,
     *   campaignType?: ?value-of<CreateCampaignRequestCampaignType>,
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
        array $values,
    ) {
        $this->referenceId = $values['referenceId'] ?? null;
        $this->brandId = $values['brandId'];
        $this->campaignType = $values['campaignType'] ?? null;
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
}
