<?php

declare(strict_types=1);

namespace Vobiz\Xml;

/** <PreAnswer> early-media block. Nest <Speak>/<Play>/<Wait> inside. */
class PreAnswerElement extends VobizXMLElement
{
    use SpeakPlayTrait;

    public function __construct()
    {
        parent::__construct('PreAnswer', null, []);
    }

    /** @param array<int|string, mixed> $attrs camelCase attributes. */
    public function addWait(mixed ...$attrs): WaitElement
    {
        return $this->add(new WaitElement(...$attrs));
    }
}
