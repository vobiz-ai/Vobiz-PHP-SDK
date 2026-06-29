<?php

namespace Vobiz\Conference\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class PlayAudioMemberRequest extends JsonSerializableType
{
    /**
     * @var string $url URL of the audio file to play
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   url: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
    }
}
