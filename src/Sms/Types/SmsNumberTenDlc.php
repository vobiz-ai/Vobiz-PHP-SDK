<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * The most relevant US registration campaign attached to a number. `null` when no campaign is attached.
 */
class SmsNumberTenDlc extends JsonSerializableType
{
    /**
     * @var ?string $campaignId ID of the campaign the number is registered to. Use it with the 10DLC campaign endpoints.
     */
    #[JsonProperty('campaignId')]
    public ?string $campaignId;

    /**
     * @var ?string $campaignName Name you gave that campaign.
     */
    #[JsonProperty('campaignName')]
    public ?string $campaignName;

    /**
     * @var ?string $stage Registry stage of the campaign in upper case, for example `REGISTERED` or `IN_REVIEW`. Treat as an open string.
     */
    #[JsonProperty('stage')]
    public ?string $stage;

    /**
     * @param array{
     *   campaignId?: ?string,
     *   campaignName?: ?string,
     *   stage?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
