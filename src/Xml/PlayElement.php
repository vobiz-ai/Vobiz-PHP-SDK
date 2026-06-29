<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <Play> a remote MP3/WAV URL (the URL is the text content). */
class PlayElement extends VobizXMLElement
{
    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function __construct(?string $url = null, mixed ...$attrs)
    {
        parent::__construct('Play', $url, self::normalizeAttrs($attrs));
    }
}
