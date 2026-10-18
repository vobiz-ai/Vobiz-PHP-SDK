<?php

namespace Vobiz\Sms\Broadcasts\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class PreviewBroadcastRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Number of pending recipients to render in `samples`, from 1 to 50. Defaults to 5 when you omit it or pass `0`. A value above 50 returns `400` with `limit must be between 1 and 50`, and a non-integer returns `400` with `limit must be an integer`.
     */
    public ?int $limit;

    /**
     * @param array{
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
    }
}
