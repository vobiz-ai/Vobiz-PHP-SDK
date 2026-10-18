<?php

namespace Vobiz\Sms\Campaigns\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CampaignRegisterRequest extends JsonSerializableType
{
    /**
     * @var ?string $priorityId ID (UUID) of a priority option from `GET /10dlc/campaigns/priorities`, for toll-free campaigns. A value that is not a UUID returns `400` with `invalid request: priorityId must be a UUID`.
     */
    #[JsonProperty('priorityId')]
    public ?string $priorityId;

    /**
     * @param array{
     *   priorityId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->priorityId = $values['priorityId'] ?? null;
    }
}
