<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * One page of messages from `GET /messages`, with the total number of matches so you can page through the rest.
 */
class MessageList extends JsonSerializableType
{
    /**
     * @var ?array<Message> $messages The messages on this page, newest first. An empty array when nothing matches.
     */
    #[JsonProperty('messages'), ArrayType([Message::class])]
    public ?array $messages;

    /**
     * @var ?int $total Total number of messages that match your filters across all pages. Stop paging when `offset` plus the page length reaches it.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $limit The `limit` you sent in the request, or `0` when you omitted it. The page itself holds at most 100 messages, and 20 when `limit` is omitted.
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @var ?int $offset The number of messages skipped before this page, as sent in the request.
     */
    #[JsonProperty('offset')]
    public ?int $offset;

    /**
     * @param array{
     *   messages?: ?array<Message>,
     *   total?: ?int,
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->messages = $values['messages'] ?? null;
        $this->total = $values['total'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
