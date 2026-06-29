<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use Vobiz\Core\Types\Union;

class ListKycSessionsResponseSessionsItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $accountAuthId
     */
    #[JsonProperty('account_auth_id')]
    public string $accountAuthId;

    /**
     * @var ?string $customerEmail
     */
    #[JsonProperty('customer_email')]
    public ?string $customerEmail;

    /**
     * @var ?string $kycType
     */
    #[JsonProperty('kyc_type')]
    public ?string $kycType;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $expiresAt
     */
    #[JsonProperty('expires_at')]
    public string $expiresAt;

    /**
     * @var ?string $firstOpenedAt
     */
    #[JsonProperty('first_opened_at')]
    public ?string $firstOpenedAt;

    /**
     * @var ?string $completedAt
     */
    #[JsonProperty('completed_at')]
    public ?string $completedAt;

    /**
     * @var ?string $webhookUrl
     */
    #[JsonProperty('webhook_url')]
    public ?string $webhookUrl;

    /**
     * @var ?string $redirectUrl
     */
    #[JsonProperty('redirect_url')]
    public ?string $redirectUrl;

    /**
     * @var array<ListKycSessionsResponseSessionsItemReminderScheduleItem> $reminderSchedule
     */
    #[JsonProperty('reminder_schedule'), ArrayType([ListKycSessionsResponseSessionsItemReminderScheduleItem::class])]
    public array $reminderSchedule;

    /**
     * @var (
     *    mixed
     *   |ListKycSessionsResponseSessionsItemMetadataCustomerRef
     *   |null
     * ) $metadata
     */
    #[JsonProperty('metadata'), Union(new Union('mixed', 'null'), ListKycSessionsResponseSessionsItemMetadataCustomerRef::class)]
    public mixed $metadata;

    /**
     * @var (
     *    mixed
     *   |ListKycSessionsResponseSessionsItemVerifiedDataAadhaarDob
     *   |null
     * ) $verifiedData
     */
    #[JsonProperty('verified_data'), Union(new Union('mixed', 'null'), ListKycSessionsResponseSessionsItemVerifiedDataAadhaarDob::class)]
    public mixed $verifiedData;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   accountAuthId: string,
     *   status: string,
     *   expiresAt: string,
     *   reminderSchedule: array<ListKycSessionsResponseSessionsItemReminderScheduleItem>,
     *   metadata: (
     *    mixed
     *   |ListKycSessionsResponseSessionsItemMetadataCustomerRef
     *   |null
     * ),
     *   verifiedData: (
     *    mixed
     *   |ListKycSessionsResponseSessionsItemVerifiedDataAadhaarDob
     *   |null
     * ),
     *   createdAt: string,
     *   updatedAt: string,
     *   customerEmail?: ?string,
     *   kycType?: ?string,
     *   firstOpenedAt?: ?string,
     *   completedAt?: ?string,
     *   webhookUrl?: ?string,
     *   redirectUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->accountAuthId = $values['accountAuthId'];
        $this->customerEmail = $values['customerEmail'] ?? null;
        $this->kycType = $values['kycType'] ?? null;
        $this->status = $values['status'];
        $this->expiresAt = $values['expiresAt'];
        $this->firstOpenedAt = $values['firstOpenedAt'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
        $this->webhookUrl = $values['webhookUrl'] ?? null;
        $this->redirectUrl = $values['redirectUrl'] ?? null;
        $this->reminderSchedule = $values['reminderSchedule'];
        $this->metadata = $values['metadata'];
        $this->verifiedData = $values['verifiedData'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
