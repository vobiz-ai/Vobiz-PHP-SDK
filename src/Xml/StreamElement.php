<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <Stream> fork audio to a WebSocket (the wss URL is the text content). */
class StreamElement extends VobizXMLElement
{
    /** @param array<int|string, mixed> $attrs camelCase attributes (e.g. `audioTrack`, `bidirectional`). */
    public function __construct(?string $url = null, mixed ...$attrs)
    {
        parent::__construct('Stream', $url, self::normalizeAttrs($attrs));
    }
}
