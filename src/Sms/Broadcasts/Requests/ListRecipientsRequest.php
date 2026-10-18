<?php

namespace Vobiz\Sms\Broadcasts\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Broadcasts\Types\ListRecipientsRequestStatus;

class ListRecipientsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListRecipientsRequestStatus> $status Return only recipients in this state, matched case-insensitively. `pending` waits to send, `sending` is in progress, `sent` and `delivered` track the message, `failed` has an `errorCode`, `opted_out` was excluded because the number opted out, and `skipped` was still pending when the broadcast was cancelled. Omit it to return every recipient; any other value returns `400`.
     */
    public ?string $status;

    /**
     * @var ?int $limit Maximum number of recipients to return, from 1 to 500. Defaults to 50 when you omit it or pass `0`. A value above 500 returns `400` with `limit must be between 1 and 500`, and a non-integer returns `400` with `limit must be an integer`.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of recipients to skip before the page starts, for paging through results with `limit`. Defaults to `0`. A negative value returns `400` with `offset must be >= 0`, and a non-integer returns `400` with `offset must be an integer`.
     */
    public ?int $offset;

    /**
     * @param array{
     *   status?: ?value-of<ListRecipientsRequestStatus>,
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
