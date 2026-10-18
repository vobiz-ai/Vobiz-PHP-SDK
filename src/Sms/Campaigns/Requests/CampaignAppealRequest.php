<?php

namespace Vobiz\Sms\Campaigns\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CampaignAppealRequest extends JsonSerializableType
{
    /**
     * @var string $reason Required. Explains why the campaign should be reconsidered and what you changed; address every point in the campaign's `rejectionReasons`.
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @param array{
     *   reason: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reason = $values['reason'];
    }
}
