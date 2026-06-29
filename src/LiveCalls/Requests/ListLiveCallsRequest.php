<?php

namespace Vobiz\LiveCalls\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\LiveCalls\Types\ListLiveCallsRequestStatus;

class ListLiveCallsRequest extends JsonSerializableType
{
    /**
     * @var value-of<ListLiveCallsRequestStatus> $status
     */
    public string $status;

    /**
     * @param array{
     *   status: value-of<ListLiveCallsRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
    }
}
