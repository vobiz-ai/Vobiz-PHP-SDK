<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * The unread total across all your conversations.
 */
class UnreadCount extends JsonSerializableType
{
    /**
     * @var ?int $totalUnread Sum of `unreadCount` over all your conversations. `0` when every thread has been marked read.
     */
    #[JsonProperty('totalUnread')]
    public ?int $totalUnread;

    /**
     * @param array{
     *   totalUnread?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->totalUnread = $values['totalUnread'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
