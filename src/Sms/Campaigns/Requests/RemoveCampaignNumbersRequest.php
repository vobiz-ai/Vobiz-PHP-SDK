<?php

namespace Vobiz\Sms\Campaigns\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Types\CampaignNumbersRequest;

class RemoveCampaignNumbersRequest extends JsonSerializableType
{
    /**
     * @var CampaignNumbersRequest $body
     */
    public CampaignNumbersRequest $body;

    /**
     * @param array{
     *   body: CampaignNumbersRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
