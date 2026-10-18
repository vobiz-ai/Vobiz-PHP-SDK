<?php

namespace Vobiz\Sms\Messages\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Messages\Types\ListMessagesRequestStatus;
use Vobiz\Sms\Messages\Types\ListMessagesRequestChannel;
use Vobiz\Sms\Messages\Types\ListMessagesRequestDirection;
use DateTime;

class ListMessagesRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListMessagesRequestStatus> $status Only messages with this status: `scheduled`, `sent`, `delivered`, `failed`, `received` (inbound) or `unknown`.
     */
    public ?string $status;

    /**
     * @var ?value-of<ListMessagesRequestChannel> $channel Only messages sent or received on this channel: `sms`, `mms` or `rcs`. This is the channel actually used, so an SMS that was upgraded to MMS appears under `mms`.
     */
    public ?string $channel;

    /**
     * @var ?value-of<ListMessagesRequestDirection> $direction `out` for messages you sent, `in` for messages your numbers received.
     */
    public ?string $direction;

    /**
     * @var ?string $to Recipient number to filter on, in E.164 format, exact match. For inbound messages this is your number.
     */
    public ?string $to;

    /**
     * @var ?string $from Sender to filter on, exact match: one of your numbers in E.164 format (for example `+14155550100`), or the `senderName` of your RCS sender for RCS messages. For inbound messages this is the contact's number.
     */
    public ?string $from;

    /**
     * @var ?string $tag Only messages whose `tag` equals this value, exact match. Set the same `tag` on related sends to retrieve them together.
     */
    public ?string $tag;

    /**
     * @var ?DateTime $startDate Only messages created at or after this time, as an RFC 3339 / ISO 8601 timestamp such as `2026-10-01T00:00:00Z`.
     */
    public ?DateTime $startDate;

    /**
     * @var ?DateTime $endDate Only messages created before this time, as an RFC 3339 / ISO 8601 timestamp such as `2026-11-01T00:00:00Z`. Combine with `startDate` for a date range.
     */
    public ?DateTime $endDate;

    /**
     * @var ?int $limit Maximum number of messages to return, from `1` to `100`. Defaults to `20`; a value outside that range also returns `20`.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of records to skip before the page starts, `0` or greater. Defaults to `0`. Add the page size to it to fetch the next page.
     */
    public ?int $offset;

    /**
     * @param array{
     *   status?: ?value-of<ListMessagesRequestStatus>,
     *   channel?: ?value-of<ListMessagesRequestChannel>,
     *   direction?: ?value-of<ListMessagesRequestDirection>,
     *   to?: ?string,
     *   from?: ?string,
     *   tag?: ?string,
     *   startDate?: ?DateTime,
     *   endDate?: ?DateTime,
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->to = $values['to'] ?? null;
        $this->from = $values['from'] ?? null;
        $this->tag = $values['tag'] ?? null;
        $this->startDate = $values['startDate'] ?? null;
        $this->endDate = $values['endDate'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
