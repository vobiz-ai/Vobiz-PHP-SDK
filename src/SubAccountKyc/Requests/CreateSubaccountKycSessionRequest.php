<?php

namespace Vobiz\SubAccountKyc\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\SubAccountKyc\Types\CreateSubaccountKycSessionRequestFlowType;

class CreateSubaccountKycSessionRequest extends JsonSerializableType
{
    /**
     * @var string $accountAuthId The sub-account's auth_id (typically equal to the path `sub_auth_id`).
     */
    #[JsonProperty('account_auth_id')]
    public string $accountAuthId;

    /**
     * @var value-of<CreateSubaccountKycSessionRequestFlowType> $flowType
     */
    #[JsonProperty('flow_type')]
    public string $flowType;

    /**
     * @var ?string $customerEmail Required when `flow_type` is `email`.
     */
    #[JsonProperty('customer_email')]
    public ?string $customerEmail;

    /**
     * Required when `flow_type` is `redirect`. After verification the customer's
     * browser is sent to this URL.
     *
     * @var ?string $redirectUrl
     */
    #[JsonProperty('redirect_url')]
    public ?string $redirectUrl;

    /**
     * @var ?string $webhookUrl HTTPS endpoint VoBiz POSTs the KYC result to. Omit it and no callbacks are sent.
     */
    #[JsonProperty('webhook_url')]
    public ?string $webhookUrl;

    /**
     * @var ?int $expiresInDays
     */
    #[JsonProperty('expires_in_days')]
    public ?int $expiresInDays;

    /**
     * @param array{
     *   accountAuthId: string,
     *   flowType: value-of<CreateSubaccountKycSessionRequestFlowType>,
     *   customerEmail?: ?string,
     *   redirectUrl?: ?string,
     *   webhookUrl?: ?string,
     *   expiresInDays?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountAuthId = $values['accountAuthId'];
        $this->flowType = $values['flowType'];
        $this->customerEmail = $values['customerEmail'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->webhookUrl = $values['webhookUrl'] ?? null;
        $this->expiresInDays = $values['expiresInDays'] ?? null;
    }
}
