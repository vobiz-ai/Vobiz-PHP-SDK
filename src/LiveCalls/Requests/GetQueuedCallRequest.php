<?php

namespace Vobiz\LiveCalls\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\LiveCalls\Types\GetQueuedCallRequestStatus;

class GetQueuedCallRequest extends JsonSerializableType
{
    /**
     * @var value-of<GetQueuedCallRequestStatus> $status
     */
    public string $status;

    /**
     * @param array{
     *   status: value-of<GetQueuedCallRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
    }
}
