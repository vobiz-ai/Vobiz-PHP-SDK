<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <Number> a PSTN number to dial (nested in <Dial>; number is the text content). */
class NumberElement extends VobizXMLElement
{
    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function __construct(?string $number = null, mixed ...$attrs)
    {
        parent::__construct('Number', $number, self::normalizeAttrs($attrs));
    }
}
