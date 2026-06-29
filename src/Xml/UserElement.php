<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <User> a SIP endpoint to dial (nested in <Dial>; sip URI is the text content). */
class UserElement extends VobizXMLElement
{
    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function __construct(?string $sipUri = null, mixed ...$attrs)
    {
        parent::__construct('User', $sipUri, self::normalizeAttrs($attrs));
    }
}
