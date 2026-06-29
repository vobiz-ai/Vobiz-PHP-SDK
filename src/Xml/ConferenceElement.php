<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <Conference> join a room (room name is the text content). */
class ConferenceElement extends VobizXMLElement
{
    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function __construct(?string $room = null, mixed ...$attrs)
    {
        parent::__construct('Conference', $room, self::normalizeAttrs($attrs));
    }
}
