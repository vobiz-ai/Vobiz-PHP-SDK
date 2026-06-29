<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <Redirect> transfer flow control to a URL (the URL is the text content). */
class RedirectElement extends VobizXMLElement
{
    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function __construct(?string $url = null, mixed ...$attrs)
    {
        parent::__construct('Redirect', $url, self::normalizeAttrs($attrs));
    }
}
