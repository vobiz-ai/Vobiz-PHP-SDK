<?php

namespace Vobiz\Sms\Traits;

use Vobiz\Sms\Types\MessageDirection;
use Vobiz\Sms\Types\MessageChannel;
use Vobiz\Sms\Types\MessageStatus;
use DateTime;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use Vobiz\Core\Types\Date;

/**
 * One message sent from or received by your account. Each recipient of a send gets its own message object with its own `id`, status and conversation.
 *
 * @property ?string $id
 * @property ?string $accountId
 * @property ?value-of<MessageDirection> $direction
 * @property ?value-of<MessageChannel> $channel
 * @property ?string $from
 * @property ?string $to
 * @property ?string $text
 * @property ?array<string> $mediaUrls
 * @property ?value-of<MessageStatus> $status
 * @property ?string $errorCode
 * @property ?string $errorMessage
 * @property ?string $tag
 * @property ?string $conversationId
 * @property ?DateTime $scheduledAt
 * @property ?DateTime $createdAt
 * @property ?DateTime $updatedAt
 */
trait Message
{
    /**
     * @var ?string $id Unique identifier of the message (UUID). Use it with `GET /messages/{id}` and to match status events.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $accountId Your Vobiz account ID (Auth ID), for example `MA_XXXXXXXX`.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?value-of<MessageDirection> $direction `out` for a message you sent, `in` for a message one of your numbers received.
     */
    #[JsonProperty('direction')]
    public ?string $direction;

    /**
     * @var ?value-of<MessageChannel> $channel Channel the message actually used: `sms`, `mms` or `rcs`. It can differ from the one you requested, for example `mms` after an SMS with media to US or Canadian numbers, or `sms` after an RCS send fell back with `failoverToSms`.
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?string $from Sender. For outbound messages, your number in E.164 format or the `senderName` of your RCS sender; for inbound messages, the contact's number.
     */
    #[JsonProperty('from')]
    public ?string $from;

    /**
     * @var ?string $to Recipient. For outbound messages, the contact's number in E.164 format; for inbound messages, your number.
     */
    #[JsonProperty('to')]
    public ?string $to;

    /**
     * @var ?string $text Message body. An empty string when the message has no text, for example an MMS with media only.
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @var ?array<string> $mediaUrls HTTPS URLs of the media attached to the message. `null` or an empty array when there is no media.
     */
    #[JsonProperty('mediaUrls'), ArrayType(['string'])]
    public ?array $mediaUrls;

    /**
     * @var ?value-of<MessageStatus> $status Where the message is in its lifecycle: `scheduled` (held for `scheduledAt`), `sent` (handed to the network), `delivered` (delivery confirmed), `failed` (see `errorCode` and `errorMessage`), `received` (inbound) or `unknown` (the network reported a status that maps to none of the others).
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $errorCode Error code reported for a failed message. Omitted when there is no error.
     */
    #[JsonProperty('errorCode')]
    public ?string $errorCode;

    /**
     * @var ?string $errorMessage Human-readable reason a message failed. Omitted when there is no error; quote it to support when you need help with a failure.
     */
    #[JsonProperty('errorMessage')]
    public ?string $errorMessage;

    /**
     * @var ?string $tag The label you set when sending, for filtering and reporting. Omitted when none was set.
     */
    #[JsonProperty('tag')]
    public ?string $tag;

    /**
     * @var ?string $conversationId UUID of the conversation the message belongs to. Use it with `GET /conversations/{id}/messages` to load the thread.
     */
    #[JsonProperty('conversationId')]
    public ?string $conversationId;

    /**
     * @var ?DateTime $scheduledAt The time you asked the message to be held until (ISO 8601, UTC). Omitted for messages that were not scheduled.
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?DateTime $createdAt When the message was created, as an RFC 3339 / ISO 8601 timestamp in UTC.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt When the message last changed, for example on a status update (ISO 8601, UTC).
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;
}
