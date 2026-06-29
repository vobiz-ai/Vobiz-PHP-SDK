<?php

namespace Vobiz\ConferenceRecording\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\ConferenceRecording\Types\StartConferenceRecordingRequestFileFormat;
use Vobiz\Core\Json\JsonProperty;

class StartConferenceRecordingRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<StartConferenceRecordingRequestFileFormat> $fileFormat
     */
    #[JsonProperty('file_format')]
    public ?string $fileFormat;

    /**
     * @var ?string $callbackUrl
     */
    #[JsonProperty('callback_url')]
    public ?string $callbackUrl;

    /**
     * @param array{
     *   fileFormat?: ?value-of<StartConferenceRecordingRequestFileFormat>,
     *   callbackUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fileFormat = $values['fileFormat'] ?? null;
        $this->callbackUrl = $values['callbackUrl'] ?? null;
    }
}
