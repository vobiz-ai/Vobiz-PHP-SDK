<?php

namespace Vobiz\Sms\OptOuts\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class DeleteOptOutRequest extends JsonSerializableType
{
    /**
     * @var ?string $channel Channel to remove the opt-out from: `sms`, `mms` or `rcs`. Defaults to `sms`.
     */
    public ?string $channel;

    /**
     * @param array{
     *   channel?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->channel = $values['channel'] ?? null;
    }
}
