<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Sms\Traits\Message;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;

/**
 * A message with its full status history, as returned by `GET /messages/{id}`. It has every field of the message object plus `statusHistory`.
 */
class MessageWithHistory extends JsonSerializableType
{
    use Message;

    /**
     * @var ?array<MessageStatusEntry> $statusHistory Every status the message has passed through, oldest first, each with its time and any error detail. `null` when no status change has been recorded.
     */
    #[JsonProperty('statusHistory'), ArrayType([MessageStatusEntry::class])]
    public ?array $statusHistory;

    /**
     * @param array{
     *   id?: ?string,
     *   accountId?: ?string,
     *   direction?: ?value-of<MessageDirection>,
     *   channel?: ?value-of<MessageChannel>,
     *   from?: ?string,
     *   to?: ?string,
     *   text?: ?string,
     *   mediaUrls?: ?array<string>,
     *   status?: ?value-of<MessageStatus>,
     *   errorCode?: ?string,
     *   errorMessage?: ?string,
     *   tag?: ?string,
     *   conversationId?: ?string,
     *   scheduledAt?: ?DateTime,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     *   statusHistory?: ?array<MessageStatusEntry>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->direction = $values['direction'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->from = $values['from'] ?? null;
        $this->to = $values['to'] ?? null;
        $this->text = $values['text'] ?? null;
        $this->mediaUrls = $values['mediaUrls'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->errorCode = $values['errorCode'] ?? null;
        $this->errorMessage = $values['errorMessage'] ?? null;
        $this->tag = $values['tag'] ?? null;
        $this->conversationId = $values['conversationId'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->statusHistory = $values['statusHistory'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
