<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * A two-way thread between one of your numbers (or RCS senders) and one contact on one channel. Vobiz creates it with the first message in either direction and adds every later message between the same pair on that channel.
 */
class Conversation extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier of the conversation (UUID). Pass it to the conversation endpoints; messages carry it as `conversationId`.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $accountId Your Vobiz account ID (Auth ID), for example `MA_XXXXXXXX`.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?string $participantA Your side of the thread: your number in E.164 format, or the `senderName` of your RCS sender.
     */
    #[JsonProperty('participantA')]
    public ?string $participantA;

    /**
     * @var ?string $participantB The contact's phone number in E.164 format.
     */
    #[JsonProperty('participantB')]
    public ?string $participantB;

    /**
     * @var ?value-of<ConversationChannel> $channel Channel the thread runs on: `sms`, `mms` or `rcs`. The same two parties have a separate conversation on each channel.
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?DateTime $lastMessageAt Time of the latest message in the thread, sent or received (ISO 8601, UTC). Conversation lists are ordered by it, newest first.
     */
    #[JsonProperty('lastMessageAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastMessageAt;

    /**
     * @var ?int $messageCount Total number of messages in the thread, in both directions.
     */
    #[JsonProperty('messageCount')]
    public ?int $messageCount;

    /**
     * @var ?int $unreadCount Number of messages added to the thread since it was last marked read. `POST /conversations/{id}/read` resets it to `0`.
     */
    #[JsonProperty('unreadCount')]
    public ?int $unreadCount;

    /**
     * @var ?DateTime $lastReadAt When the thread was last marked read (ISO 8601, UTC). Omitted until you first call `POST /conversations/{id}/read`.
     */
    #[JsonProperty('lastReadAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastReadAt;

    /**
     * @var ?DateTime $createdAt When the conversation was created, as an RFC 3339 / ISO 8601 timestamp in UTC.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   id?: ?string,
     *   accountId?: ?string,
     *   participantA?: ?string,
     *   participantB?: ?string,
     *   channel?: ?value-of<ConversationChannel>,
     *   lastMessageAt?: ?DateTime,
     *   messageCount?: ?int,
     *   unreadCount?: ?int,
     *   lastReadAt?: ?DateTime,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->participantA = $values['participantA'] ?? null;
        $this->participantB = $values['participantB'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->lastMessageAt = $values['lastMessageAt'] ?? null;
        $this->messageCount = $values['messageCount'] ?? null;
        $this->unreadCount = $values['unreadCount'] ?? null;
        $this->lastReadAt = $values['lastReadAt'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
