<?php

namespace Vobiz\Sms\Broadcasts\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListBroadcastsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Maximum number of broadcasts to return, from 1 to 500. Defaults to 50 when you omit it or pass `0`. A value above 500 returns `400` with `limit must be between 1 and 500`, and a non-integer returns `400` with `limit must be an integer`.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of broadcasts to skip before the page starts, for paging through results with `limit`. Defaults to `0`. A negative value returns `400` with `offset must be >= 0`, and a non-integer returns `400` with `offset must be an integer`.
     */
    public ?int $offset;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
