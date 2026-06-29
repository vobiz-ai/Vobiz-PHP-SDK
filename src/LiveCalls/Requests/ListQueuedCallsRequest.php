<?php

namespace Vobiz\LiveCalls\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\LiveCalls\Types\ListQueuedCallsRequestStatus;

class ListQueuedCallsRequest extends JsonSerializableType
{
    /**
     * @var value-of<ListQueuedCallsRequestStatus> $status
     */
    public string $status;

    /**
     * @param array{
     *   status: value-of<ListQueuedCallsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
    }
}
