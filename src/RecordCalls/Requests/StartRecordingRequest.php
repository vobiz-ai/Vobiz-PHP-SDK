<?php

namespace Vobiz\RecordCalls\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\RecordCalls\Types\StartRecordingRequestFileFormat;
use Vobiz\RecordCalls\Types\StartRecordingRequestRecordChannelType;

class StartRecordingRequest extends JsonSerializableType
{
    /**
     * @var ?int $timeLimit
     */
    #[JsonProperty('time_limit')]
    public ?int $timeLimit;

    /**
     * @var ?value-of<StartRecordingRequestFileFormat> $fileFormat
     */
    #[JsonProperty('file_format')]
    public ?string $fileFormat;

    /**
     * @var ?string $transcriptionType Set to `auto` to enable transcription
     */
    #[JsonProperty('transcription_type')]
    public ?string $transcriptionType;

    /**
     * @var ?string $callbackUrl
     */
    #[JsonProperty('callback_url')]
    public ?string $callbackUrl;

    /**
     * @var ?value-of<StartRecordingRequestRecordChannelType> $recordChannelType
     */
    #[JsonProperty('record_channel_type')]
    public ?string $recordChannelType;

    /**
     * @param array{
     *   timeLimit?: ?int,
     *   fileFormat?: ?value-of<StartRecordingRequestFileFormat>,
     *   transcriptionType?: ?string,
     *   callbackUrl?: ?string,
     *   recordChannelType?: ?value-of<StartRecordingRequestRecordChannelType>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->timeLimit = $values['timeLimit'] ?? null;
        $this->fileFormat = $values['fileFormat'] ?? null;
        $this->transcriptionType = $values['transcriptionType'] ?? null;
        $this->callbackUrl = $values['callbackUrl'] ?? null;
        $this->recordChannelType = $values['recordChannelType'] ?? null;
    }
}
