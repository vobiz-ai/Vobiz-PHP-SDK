<?php

namespace Vobiz\Sms\Broadcasts\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Types\BroadcastUpdateInput;

class UpdateBroadcastRequest extends JsonSerializableType
{
    /**
     * @var BroadcastUpdateInput $body
     */
    public BroadcastUpdateInput $body;

    /**
     * @param array{
     *   body: BroadcastUpdateInput,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
