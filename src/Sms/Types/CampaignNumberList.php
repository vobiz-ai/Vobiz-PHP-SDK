<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * Numbers the US 10DLC registry associates with a campaign.
 */
class CampaignNumberList extends JsonSerializableType
{
    /**
     * @var ?array<CampaignNumberPreview> $numberPreviews One entry per attached number. Empty when no numbers are attached.
     */
    #[JsonProperty('numberPreviews'), ArrayType([CampaignNumberPreview::class])]
    public ?array $numberPreviews;

    /**
     * @param array{
     *   numberPreviews?: ?array<CampaignNumberPreview>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->numberPreviews = $values['numberPreviews'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
