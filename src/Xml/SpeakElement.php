<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/**
 * <Speak> text-to-speech. Pass `ssml: '<prosody …>…</prosody>'` to inject raw
 * SSML unescaped instead of plain text.
 */
class SpeakElement extends VobizXMLElement
{
    /**
     * @param array<int|string, mixed> $attrs camelCase attributes; an `ssml` key
     *                                         injects raw SSML as the content.
     */
    public function __construct(?string $content = null, mixed ...$attrs)
    {
        $attrs = self::normalizeAttrs($attrs);
        $ssml = $attrs['ssml'] ?? null;
        unset($attrs['ssml']);

        if ($ssml !== null) {
            parent::__construct('Speak', (string) $ssml, $attrs, true);
        } else {
            parent::__construct('Speak', $content, $attrs);
        }
    }
}
