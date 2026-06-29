<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <Record/> record the call/leg (self-closing). */
class RecordElement extends VobizXMLElement
{
    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function __construct(mixed ...$attrs)
    {
        parent::__construct('Record', null, self::normalizeAttrs($attrs));
    }
}
