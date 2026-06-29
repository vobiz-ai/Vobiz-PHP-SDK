<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <Hangup/> end/reject the call (self-closing). */
class HangupElement extends VobizXMLElement
{
    /** @param array<int|string, mixed> $attrs camelCase attributes (e.g. `reason: 'busy'`). */
    public function __construct(mixed ...$attrs)
    {
        parent::__construct('Hangup', null, self::normalizeAttrs($attrs));
    }
}
