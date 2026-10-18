<?php

namespace Vobiz\Sms\Campaigns\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Traits\CampaignFields;

class UpdateCampaignRequest extends JsonSerializableType
{
    use CampaignFields;


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
}
