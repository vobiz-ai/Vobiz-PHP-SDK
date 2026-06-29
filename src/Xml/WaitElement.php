<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <Wait/> silent pause (self-closing). */
class WaitElement extends VobizXMLElement
{
    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function __construct(mixed ...$attrs)
    {
        parent::__construct('Wait', null, self::normalizeAttrs($attrs));
    }
}
