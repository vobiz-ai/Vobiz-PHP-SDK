<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/**
 * Shared `addSpeak` / `addPlay` helpers for the containers that hold prompts
 * (<Response>, <Gather>, <PreAnswer>). Each returns the created child for nesting.
 */
trait SpeakPlayTrait
{
    /** @param array<int|string, mixed> $attrs camelCase attributes (or `ssml`). */
    public function addSpeak(?string $content = null, mixed ...$attrs): SpeakElement
    {
        return $this->add(new SpeakElement($content, ...$attrs));
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addPlay(?string $url = null, mixed ...$attrs): PlayElement
    {
        return $this->add(new PlayElement($url, ...$attrs));
    }
}
