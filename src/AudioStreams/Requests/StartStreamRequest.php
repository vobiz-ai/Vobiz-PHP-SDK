<?php

namespace Vobiz\AudioStreams\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\AudioStreams\Types\StartStreamRequestAudioTrack;
use Vobiz\AudioStreams\Types\StartStreamRequestAudioFormat;

class StartStreamRequest extends JsonSerializableType
{
    /**
     * @var string $serviceUrl
     */
    #[JsonProperty('service_url')]
    public string $serviceUrl;

    /**
     * @var ?bool $bidirectional
     */
    #[JsonProperty('bidirectional')]
    public ?bool $bidirectional;

    /**
     * @var ?value-of<StartStreamRequestAudioTrack> $audioTrack
     */
    #[JsonProperty('audio_track')]
    public ?string $audioTrack;

    /**
     * @var ?value-of<StartStreamRequestAudioFormat> $audioFormat
     */
    #[JsonProperty('audio_format')]
    public ?string $audioFormat;

    /**
     * @param array{
     *   serviceUrl: string,
     *   bidirectional?: ?bool,
     *   audioTrack?: ?value-of<StartStreamRequestAudioTrack>,
     *   audioFormat?: ?value-of<StartStreamRequestAudioFormat>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serviceUrl = $values['serviceUrl'];
        $this->bidirectional = $values['bidirectional'] ?? null;
        $this->audioTrack = $values['audioTrack'] ?? null;
        $this->audioFormat = $values['audioFormat'] ?? null;
    }
}
