<?php

namespace Vobiz\LiveCalls\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\LiveCalls\Types\GetLiveCallRequestStatus;

class GetLiveCallRequest extends JsonSerializableType
{
    /**
     * @var value-of<GetLiveCallRequestStatus> $status
     */
    public string $status;

    /**
     * @param array{
     *   status: value-of<GetLiveCallRequestStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
    }
}
