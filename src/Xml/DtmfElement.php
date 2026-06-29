<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <DTMF> send digits on a live call (digits are the text content). */
class DtmfElement extends VobizXMLElement
{
    /** @param array<int|string, mixed> $attrs camelCase attributes (e.g. `async: false`). */
    public function __construct(?string $digits = null, mixed ...$attrs)
    {
        parent::__construct('DTMF', $digits, self::normalizeAttrs($attrs));
    }
}
