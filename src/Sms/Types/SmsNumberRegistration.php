<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * US A2P registration state of a number: which registration path applies and how far it has progressed.
 */
class SmsNumberRegistration extends JsonSerializableType
{
    /**
     * @var ?value-of<SmsNumberRegistrationKind> $kind Registration path: `10dlc` for long numbers that need a 10DLC campaign, `toll_free` for toll-free numbers that need toll-free verification, `none` when no US registration applies.
     */
    #[JsonProperty('kind')]
    public ?string $kind;

    /**
     * @var ?value-of<SmsNumberRegistrationStatus> $status Progress of that registration: `not_registered` (no campaign attached), `draft` (campaign not submitted), `pending` (under review), `approved` (cleared to send to US recipients), `rejected` (fix and resubmit) or `not_required`.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $campaignId ID of the campaign the number is attached to. Empty string when none.
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?string $campaignName Name of that campaign. Empty string when none.
     */
    #[JsonProperty('campaignName')]
    public ?string $campaignName;

    /**
     * @var ?string $stage Registry stage of that campaign in upper case, for example `REGISTERED`. Treat as an open string; empty string when none.
     */
    #[JsonProperty('stage')]
    public ?string $stage;

    /**
     * @param array{
     *   kind?: ?value-of<SmsNumberRegistrationKind>,
     *   status?: ?value-of<SmsNumberRegistrationStatus>,
     *   campaignId?: ?string,
     *   campaignName?: ?string,
     *   stage?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->kind = $values['kind'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->campaignName = $values['campaignName'] ?? null;
        $this->stage = $values['stage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
