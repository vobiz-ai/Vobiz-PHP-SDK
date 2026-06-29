<?php

namespace Vobiz\SpeakText\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\SpeakText\Types\SpeakTextCallRequestLegs;

class SpeakTextCallRequest extends JsonSerializableType
{
    /**
     * @var string $text
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @var ?string $voice
     */
    #[JsonProperty('voice')]
    public ?string $voice;

    /**
     * @var ?string $language
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?value-of<SpeakTextCallRequestLegs> $legs
     */
    #[JsonProperty('legs')]
    public ?string $legs;

    /**
     * @param array{
     *   text: string,
     *   voice?: ?string,
     *   language?: ?string,
     *   legs?: ?value-of<SpeakTextCallRequestLegs>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->text = $values['text'];
        $this->voice = $values['voice'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->legs = $values['legs'] ?? null;
    }
}
