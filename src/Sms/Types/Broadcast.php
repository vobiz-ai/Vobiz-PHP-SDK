<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;
use Vobiz\Core\Types\ArrayType;

/**
 * A bulk SMS send that renders one template for every recipient of an uploaded list and sends at a controlled rate. Its `status` moves from `draft` through `scheduled` or `running` to `completed`, `cancelled` or `failed`, and `stats` counts recipients by state.
 */
class Broadcast extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier of the broadcast (UUID). Use it in every `/broadcasts/{id}` path.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $accountId Your Vobiz account ID (`MA_...`) that owns the broadcast.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?string $name The label you gave the broadcast, shown in the console and in listings.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $from The sender every message goes out from, as stored: an E.164 number, a short code or an alphanumeric sender ID.
     */
    #[JsonProperty('from')]
    public ?string $from;

    /**
     * @var ?value-of<BroadcastChannel> $channel The channel the broadcast sends on. Always `sms`.
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?string $template The message body with `{{variable}}` placeholders, filled per recipient from the columns of the upload. Empty until you set it.
     */
    #[JsonProperty('template')]
    public ?string $template;

    /**
     * @var ?value-of<BroadcastStatus> $status Lifecycle state. `draft` until you launch, then `scheduled` (waiting for `scheduledAt`) or `running`. `paused` after a pause call or when `pauseReason` is set; `completed` once every recipient is processed; `cancelled` after a cancel call; `failed` when the run stopped on an error.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?value-of<BroadcastPauseReason> $pauseReason Present only while the broadcast is paused for a reason other than your own pause call. `insufficient_balance` means the balance ran out; top up and call `POST /broadcasts/{id}/resume`.
     */
    #[JsonProperty('pauseReason')]
    public ?string $pauseReason;

    /**
     * @var ?DateTime $scheduledAt When sending starts after launch, in UTC (ISO 8601). `null` means sending starts as soon as you launch.
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?int $ratePerSecond Maximum messages sent per second while running, from 1 to 50.
     */
    #[JsonProperty('ratePerSecond')]
    public ?int $ratePerSecond;

    /**
     * @var ?string $tag Your label, copied onto every message the broadcast sends. Empty string when not set.
     */
    #[JsonProperty('tag')]
    public ?string $tag;

    /**
     * @var ?string $dltEntityId India (TRAI DLT). The Principal Entity ID copied onto every message. Empty string when not set.
     */
    #[JsonProperty('dltEntityId')]
    public ?string $dltEntityId;

    /**
     * @var ?string $dltHeaderId India (TRAI DLT). The registered sender header ID copied onto every message. Empty string when not set.
     */
    #[JsonProperty('dltHeaderId')]
    public ?string $dltHeaderId;

    /**
     * @var ?string $dltTemplateId India (TRAI DLT). The registered content template ID copied onto every message. Empty string when not set.
     */
    #[JsonProperty('dltTemplateId')]
    public ?string $dltTemplateId;

    /**
     * @var ?array<string> $columns Column names from the latest recipient upload, as written in your file header. The first is the phone column and the rest are available as template variables. Empty until you upload recipients.
     */
    #[JsonProperty('columns'), ArrayType(['string'])]
    public ?array $columns;

    /**
     * @var ?BroadcastStats $stats Recipient counts by state, recounted on every read.
     */
    #[JsonProperty('stats')]
    public ?BroadcastStats $stats;

    /**
     * @var ?DateTime $createdAt When the broadcast was created (ISO 8601, UTC).
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt When the broadcast last changed, including status changes (ISO 8601, UTC).
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?DateTime $startedAt When sending began (ISO 8601, UTC). `null` until the broadcast runs.
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var ?DateTime $completedAt When the broadcast finished, either because the last recipient was processed or because it was cancelled (ISO 8601, UTC). `null` until then.
     */
    #[JsonProperty('completedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   accountId?: ?string,
     *   name?: ?string,
     *   from?: ?string,
     *   channel?: ?value-of<BroadcastChannel>,
     *   template?: ?string,
     *   status?: ?value-of<BroadcastStatus>,
     *   pauseReason?: ?value-of<BroadcastPauseReason>,
     *   scheduledAt?: ?DateTime,
     *   ratePerSecond?: ?int,
     *   tag?: ?string,
     *   dltEntityId?: ?string,
     *   dltHeaderId?: ?string,
     *   dltTemplateId?: ?string,
     *   columns?: ?array<string>,
     *   stats?: ?BroadcastStats,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     *   startedAt?: ?DateTime,
     *   completedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->from = $values['from'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->template = $values['template'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->pauseReason = $values['pauseReason'] ?? null;
        $this->scheduledAt = $values['scheduledAt'] ?? null;
        $this->ratePerSecond = $values['ratePerSecond'] ?? null;
        $this->tag = $values['tag'] ?? null;
        $this->dltEntityId = $values['dltEntityId'] ?? null;
        $this->dltHeaderId = $values['dltHeaderId'] ?? null;
        $this->dltTemplateId = $values['dltTemplateId'] ?? null;
        $this->columns = $values['columns'] ?? null;
        $this->stats = $values['stats'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->startedAt = $values['startedAt'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
