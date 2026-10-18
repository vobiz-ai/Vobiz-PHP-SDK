<?php

namespace Vobiz\Sms\Traits;

use Vobiz\Sms\Types\BroadcastUpdateInputChannel;
use DateTime;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\Date;

/**
 * Broadcast fields you can change on a draft. Every field is optional; fields you leave out keep their value, and the same validation as create applies.
 *
 * @property ?string $name
 * @property ?string $from
 * @property ?value-of<BroadcastUpdateInputChannel> $channel
 * @property ?string $template
 * @property ?DateTime $scheduledAt
 * @property ?int $ratePerSecond
 * @property ?string $tag
 * @property ?string $dltEntityId
 * @property ?string $dltHeaderId
 * @property ?string $dltTemplateId
 */
trait BroadcastUpdateInput
{
    /**
     * @var ?string $name A label for the broadcast in the console and in listings, 1 to 255 characters. Required on create; on update it cannot be set to an empty string.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $from The sender every message goes out from: an SMS number on your account in E.164 format, a short code of up to 8 digits, or an alphanumeric sender ID of 1 to 11 letters, digits and spaces that starts with a letter or digit. Spaces, hyphens and brackets in phone numbers are removed before storing. Launch checks that a phone-number sender is an SMS number on your account. Required on create.
     */
    #[JsonProperty('from')]
    public ?string $from;

    /**
     * @var ?value-of<BroadcastUpdateInputChannel> $channel The channel the broadcast sends on. Broadcasts send SMS, so the only value is `sms` (matched case-insensitively), which is also the default.
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?string $template Message body, up to 5,000 characters, with `{{variable}}` placeholders filled per recipient from the columns of your upload. Placeholder names are matched case-insensitively and trimmed, so `{{ Name }}` matches a `name` column. Launch requires a non-empty template.
     */
    #[JsonProperty('template')]
    public ?string $template;

    /**
     * @var ?DateTime $scheduledAt RFC 3339 timestamp at which sending starts after you launch, for example `2026-11-01T09:00:00Z`; offsets are converted to UTC. Omit it, or pass `null` or `""`, to send as soon as you launch. On update, `null` clears a previous value.
     */
    #[JsonProperty('scheduledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $scheduledAt;

    /**
     * @var ?int $ratePerSecond Maximum messages sent per second while the broadcast runs, an integer from 1 to 50. Defaults to 5, and `0` also selects the default. Lower it to spread load on your own systems or replies.
     */
    #[JsonProperty('ratePerSecond')]
    public ?int $ratePerSecond;

    /**
     * @var ?string $tag Your own label of up to 255 characters, copied onto every message the broadcast sends so you can find them with the `tag` filter on `GET /messages`.
     */
    #[JsonProperty('tag')]
    public ?string $tag;

    /**
     * @var ?string $dltEntityId India (TRAI DLT). The Principal Entity ID you registered on a TRAI DLT portal, up to 64 characters. Pass it when the list contains Indian numbers; it is copied onto every message.
     */
    #[JsonProperty('dltEntityId')]
    public ?string $dltEntityId;

    /**
     * @var ?string $dltHeaderId India (TRAI DLT). The sender header ID you registered on a TRAI DLT portal, up to 64 characters. Copied onto every message.
     */
    #[JsonProperty('dltHeaderId')]
    public ?string $dltHeaderId;

    /**
     * @var ?string $dltTemplateId India (TRAI DLT). The content template ID you registered on a TRAI DLT portal, up to 64 characters. Your template text must match the registered template with the variables filled.
     */
    #[JsonProperty('dltTemplateId')]
    public ?string $dltTemplateId;
}
