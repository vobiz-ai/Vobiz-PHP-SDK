<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <Dial> bridge the caller to <Number>/<User> endpoints; may nest <Record>. */
class DialElement extends VobizXMLElement
{
    /** @param array<int|string, mixed> $attrs camelCase attributes (`callerId`, `timeout`, `action`, ...). */
    public function __construct(?string $number = null, mixed ...$attrs)
    {
        // A plain number as shorthand text content is allowed, but Number/User is preferred.
        parent::__construct('Dial', $number, self::normalizeAttrs($attrs));
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addNumber(?string $number = null, mixed ...$attrs): NumberElement
    {
        return $this->add(new NumberElement($number, ...$attrs));
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addUser(?string $sipUri = null, mixed ...$attrs): UserElement
    {
        return $this->add(new UserElement($sipUri, ...$attrs));
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addRecord(mixed ...$attrs): RecordElement
    {
        return $this->add(new RecordElement(...$attrs));
    }
}
