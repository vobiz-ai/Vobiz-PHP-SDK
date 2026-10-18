<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * A phone number on your opt-out list for one channel. Vobiz blocks sends and broadcast deliveries to it on that channel until you delete the entry.
 */
class OptOut extends JsonSerializableType
{
    /**
     * @var ?string $id Unique identifier of the opt-out record (UUID).
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $accountId Your Vobiz account ID (Auth ID), for example `MA_XXXXXXXX`.
     */
    #[JsonProperty('accountId')]
    public ?string $accountId;

    /**
     * @var ?string $phoneNumber The blocked phone number in E.164 format.
     */
    #[JsonProperty('phoneNumber')]
    public ?string $phoneNumber;

    /**
     * @var ?string $channel Channel the number is blocked on: `sms`, `mms` or `rcs`. An `sms` entry also blocks `mms`.
     */
    #[JsonProperty('channel')]
    public ?string $channel;

    /**
     * @var ?string $reason Why the entry exists. `stop`, `start` or `help` when the contact replied with a keyword; `manual` or your own text when you created it through the API or console.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?value-of<OptOutSource> $source `inbound` when the entry came from a keyword reply, `manual` when you created it through the API or console.
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?bool $syncedToProvider `true` when the block has also been applied on the upstream network.
     */
    #[JsonProperty('syncedToProvider')]
    public ?bool $syncedToProvider;

    /**
     * @var ?DateTime $createdAt When the number was added to the list (ISO 8601, UTC).
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   id?: ?string,
     *   accountId?: ?string,
     *   phoneNumber?: ?string,
     *   channel?: ?string,
     *   reason?: ?string,
     *   source?: ?value-of<OptOutSource>,
     *   syncedToProvider?: ?bool,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->accountId = $values['accountId'] ?? null;
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->channel = $values['channel'] ?? null;
        $this->reason = $values['reason'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->syncedToProvider = $values['syncedToProvider'] ?? null;
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
