<?php

namespace Vobiz\Sms\OptOuts\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateOptOutRequest extends JsonSerializableType
{
    /**
     * @var string $phoneNumber Required. The phone number to block, in E.164 format, for example `+14155550123`.
     */
    #[JsonProperty('phoneNumber')]
    public string $phoneNumber;

    /**
     * @var ?string $channel Channel to block: `sms`, `mms` or `rcs`. Defaults to `sms`. An `sms` opt-out also blocks `mms`.
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?string $reason Free-text note stored on the record, for example `customer request`. Defaults to `manual`. Repeating the request for the same number and channel replaces it.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   phoneNumber: string,
     *   channel?: ?string,
     *   reason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->phoneNumber = $values['phoneNumber'];
        $this->channel = $values['channel'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }
}
