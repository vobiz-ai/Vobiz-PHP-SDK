<?php

namespace Vobiz\PartnerApi\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\PartnerApi\Types\CreateKycSessionRequestFlowType;
use Vobiz\PartnerApi\Types\CreateKycSessionRequestReminderScheduleItem;
use Vobiz\Core\Types\ArrayType;

class CreateKycSessionRequest extends JsonSerializableType
{
    /**
     * @var string $accountAuthId Customer's auth_id (from create-customer-account).
     */
    #[JsonProperty('account_auth_id')]
    public string $accountAuthId;

    /**
     * Delivery mode. `email` (default) emails the customer the KYC link.
     * `redirect` returns a `widget_url` in the response for immediate redirect.
     *
     * @var ?value-of<CreateKycSessionRequestFlowType> $flowType
     */
    #[JsonProperty('flow_type')]
    public ?string $flowType;

    /**
     * @var ?string $customerEmail Required when `flow_type` is `email`. Ignored otherwise.
     */
    #[JsonProperty('customer_email')]
    public ?string $customerEmail;

    /**
     * Required when `flow_type` is `redirect`. After verification the customer's
     * browser is sent to this URL with query params `session_id`, `status`, `auth_id`.
     *
     * @var ?string $redirectUrl
     */
    #[JsonProperty('redirect_url')]
    public ?string $redirectUrl;

    /**
     * @var ?string $webhookUrl VoBiz POSTs the KYC result here.
     */
    #[JsonProperty('webhook_url')]
    public ?string $webhookUrl;

    /**
     * @var ?int $expiresInDays Days before the KYC link expires.
     */
    #[JsonProperty('expires_in_days')]
    public ?int $expiresInDays;

    /**
     * @var ?array<CreateKycSessionRequestReminderScheduleItem> $reminderSchedule Auto reminder emails before expiry. Email flow only.
     */
    #[JsonProperty('reminder_schedule'), ArrayType([CreateKycSessionRequestReminderScheduleItem::class])]
    public ?array $reminderSchedule;

    /**
     * @var ?array<string, mixed> $metadata Free-form key/value object echoed back on GET and webhooks.
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   accountAuthId: string,
     *   flowType?: ?value-of<CreateKycSessionRequestFlowType>,
     *   customerEmail?: ?string,
     *   redirectUrl?: ?string,
     *   webhookUrl?: ?string,
     *   expiresInDays?: ?int,
     *   reminderSchedule?: ?array<CreateKycSessionRequestReminderScheduleItem>,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountAuthId = $values['accountAuthId'];
        $this->flowType = $values['flowType'] ?? null;
        $this->customerEmail = $values['customerEmail'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->webhookUrl = $values['webhookUrl'] ?? null;
        $this->expiresInDays = $values['expiresInDays'] ?? null;
        $this->reminderSchedule = $values['reminderSchedule'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
