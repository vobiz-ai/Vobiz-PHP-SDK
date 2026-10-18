<?php

namespace Vobiz\Sms\Messages\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use Vobiz\Sms\Messages\Types\SendMessageRequestChannel;
use DateTime;
use Vobiz\Core\Types\Date;
use Vobiz\Sms\Types\RcsSuggestion;

class SendMessageRequest extends JsonSerializableType
{
    /**
     * @var string $from The sender. For `sms` and `mms`, one of your Vobiz numbers in E.164 format, for example `+14155550100`. For `rcs`, the `senderName` of your RCS sender (from `GET /senders`); with `failoverToSms`, the SMS copy is sent from a number on your account.
     */
    #[JsonProperty('from')]
    public string $from;

    /**
     * @var array<string> $to One or more recipient numbers in E.164 format. Each one becomes a separate message with its own `id`; blank entries and duplicates are ignored. At least one recipient is required.
     */
    #[JsonProperty('to'), ArrayType(['string'])]
    public array $to;

    /**
     * @var ?value-of<SendMessageRequestChannel> $channel Channel to send on: `sms`, `mms` or `rcs`. Defaults to `sms`. An `sms` with `mediaUrls` to US or Canadian recipients is sent as MMS automatically.
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?string $text Message body. Required for `sms` and `rcs`. A long SMS is split into segments and billed per segment (160 GSM-7 or 70 UCS-2 characters fit in one segment). For `mms`, provide `text`, `mediaUrls` or both, with `text` up to 5000 characters.
     */
    #[JsonProperty('text')]
    public ?string $text;

    /**
     * @var ?array<string> $mediaUrls Publicly reachable `https` URLs of media to attach. MMS accepts up to 10. RCS sends the first URL as a file. An SMS to recipients outside the US and Canada is sent as text only.
     */
    #[JsonProperty('mediaUrls'), ArrayType(['string'])]
    public ?array $mediaUrls;

    /**
     * @var ?string $title Subject line of an MMS. Used only when the message is sent as MMS.
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var ?string $tag Your own label, stored on every message the request creates. Filter `GET /messages` by it to find all recipients of one send or to group messages for reporting.
     */
    #[JsonProperty('tag')]
    public ?string $tag;

    /**
     * @var ?string $idempotencyKey A unique string you choose, for example a UUID or your own order ID, scoped to your account. Retrying with the same key returns the original message instead of sending again. With several recipients the key is applied per recipient.
     */
    #[JsonProperty('idempotencyKey')]
    public ?string $idempotencyKey;

    /**
     * @var ?DateTime $scheduledAt Time to hold the message until, as an RFC 3339 / ISO 8601 timestamp such as `2026-11-01T09:00:00Z`. A future time stores the message with status `scheduled`; a past time or now sends immediately.
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?bool $failoverToSms Used only when `channel` is `rcs`. When `true` and the RCS send cannot go through, Vobiz sends the same `text` as SMS and the message's `channel` becomes `sms`. Defaults to `false`.
     */
    #[JsonProperty('failoverToSms')]
    public ?bool $failoverToSms;

    /**
     * @var ?array<RcsSuggestion> $rcsSuggestions Suggestion buttons (suggested replies and actions) to show under an RCS message. Used only when `channel` is `rcs`. See the RCS suggestion object for each `type`.
     */
    #[JsonProperty('rcsSuggestions'), ArrayType([RcsSuggestion::class])]
    public ?array $rcsSuggestions;

    /**
     * @var ?string $dltEntityId India (TRAI DLT): the Principal Entity ID you registered on a TRAI DLT portal. Pass it on every message to Indian numbers.
     */
    #[JsonProperty('dltEntityId')]
    public ?string $dltEntityId;

    /**
     * @var ?string $dltHeaderId India (TRAI DLT): the ID of the sender header you registered on a TRAI DLT portal. Pass it on every message to Indian numbers.
     */
    #[JsonProperty('dltHeaderId')]
    public ?string $dltHeaderId;

    /**
     * @var ?string $dltTemplateId India (TRAI DLT): the ID of the content template you registered on a TRAI DLT portal. `text` must match that template with its variables filled in.
     */
    #[JsonProperty('dltTemplateId')]
    public ?string $dltTemplateId;

    /**
     * @param array{
     *   from: string,
     *   to: array<string>,
     *   channel?: ?value-of<SendMessageRequestChannel>,
     *   text?: ?string,
     *   mediaUrls?: ?array<string>,
     *   title?: ?string,
     *   tag?: ?string,
     *   idempotencyKey?: ?string,
     *   scheduledAt?: ?DateTime,
     *   failoverToSms?: ?bool,
     *   rcsSuggestions?: ?array<RcsSuggestion>,
     *   dltEntityId?: ?string,
     *   dltHeaderId?: ?string,
     *   dltTemplateId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->channel = $values['channel'] ?? null;
        $this->text = $values['text'] ?? null;
        $this->mediaUrls = $values['mediaUrls'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->tag = $values['tag'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->failoverToSms = $values['failoverToSms'] ?? null;
        $this->rcsSuggestions = $values['rcsSuggestions'] ?? null;
        $this->dltEntityId = $values['dltEntityId'] ?? null;
        $this->dltHeaderId = $values['dltHeaderId'] ?? null;
        $this->dltTemplateId = $values['dltTemplateId'] ?? null;
    }
}
