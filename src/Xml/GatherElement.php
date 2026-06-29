<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <Gather> collect DTMF/speech input. Nest <Speak>/<Play> prompts inside. */
class GatherElement extends VobizXMLElement
{
    use SpeakPlayTrait;

    /** @param array<int|string, mixed> $attrs camelCase attributes (`inputType`, `numDigits`, `executionTimeout`, ...). */
    public function __construct(mixed ...$attrs)
    {
        parent::__construct('Gather', null, self::normalizeAttrs($attrs));
    }
}
