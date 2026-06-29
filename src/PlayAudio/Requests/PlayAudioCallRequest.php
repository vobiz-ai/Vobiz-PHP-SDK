<?php

namespace Vobiz\PlayAudio\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\PlayAudio\Types\PlayAudioCallRequestLegs;

class PlayAudioCallRequest extends JsonSerializableType
{
    /**
     * @var string $urls
     */
    #[JsonProperty('urls')]
    public string $urls;

    /**
     * @var ?value-of<PlayAudioCallRequestLegs> $legs
     */
    #[JsonProperty('legs')]
    public ?string $legs;

    /**
     * @var ?bool $loop
     */
    #[JsonProperty('loop')]
    public ?bool $loop;

    /**
     * @param array{
     *   urls: string,
     *   legs?: ?value-of<PlayAudioCallRequestLegs>,
     *   loop?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->urls = $values['urls'];
        $this->legs = $values['legs'] ?? null;
        $this->loop = $values['loop'] ?? null;
    }
}
