<?php

namespace Vobiz\Recordings\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetRecordingResponse extends JsonSerializableType
{
    /**
     * @var string $addTime
     */
    #[JsonProperty('add_time')]
    public string $addTime;

    /**
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var string $callUuid
     */
    #[JsonProperty('call_uuid')]
    public string $callUuid;

    /**
     * @var mixed $conferenceName
     */
    #[JsonProperty('conference_name')]
    public mixed $conferenceName;

    /**
     * @var string $fromNumber
     */
    #[JsonProperty('from_number')]
    public string $fromNumber;

    /**
     * @var int $monthlyRecordingStorageAmount
     */
    #[JsonProperty('monthly_recording_storage_amount')]
    public int $monthlyRecordingStorageAmount;

    /**
     * @var string $recordingDurationMs
     */
    #[JsonProperty('recording_duration_ms')]
    public string $recordingDurationMs;

    /**
     * @var mixed $recordingEndMs
     */
    #[JsonProperty('recording_end_ms')]
    public mixed $recordingEndMs;

    /**
     * @var string $recordingFormat
     */
    #[JsonProperty('recording_format')]
    public string $recordingFormat;

    /**
     * @var string $recordingId
     */
    #[JsonProperty('recording_id')]
    public string $recordingId;

    /**
     * @var mixed $recordingStartMs
     */
    #[JsonProperty('recording_start_ms')]
    public mixed $recordingStartMs;

    /**
     * @var int $recordingStorageDuration
     */
    #[JsonProperty('recording_storage_duration')]
    public int $recordingStorageDuration;

    /**
     * @var float $recordingStorageRate
     */
    #[JsonProperty('recording_storage_rate')]
    public float $recordingStorageRate;

    /**
     * @var string $recordingType
     */
    #[JsonProperty('recording_type')]
    public string $recordingType;

    /**
     * @var string $recordingUrl
     */
    #[JsonProperty('recording_url')]
    public string $recordingUrl;

    /**
     * @var string $resourceUri
     */
    #[JsonProperty('resource_uri')]
    public string $resourceUri;

    /**
     * @var int $roundedRecordingDuration
     */
    #[JsonProperty('rounded_recording_duration')]
    public int $roundedRecordingDuration;

    /**
     * @var string $toNumber
     */
    #[JsonProperty('to_number')]
    public string $toNumber;

    /**
     * @param array{
     *   addTime: string,
     *   apiId: string,
     *   callUuid: string,
     *   fromNumber: string,
     *   monthlyRecordingStorageAmount: int,
     *   recordingDurationMs: string,
     *   recordingFormat: string,
     *   recordingId: string,
     *   recordingStorageDuration: int,
     *   recordingStorageRate: float,
     *   recordingType: string,
     *   recordingUrl: string,
     *   resourceUri: string,
     *   roundedRecordingDuration: int,
     *   toNumber: string,
     *   conferenceName?: mixed,
     *   recordingEndMs?: mixed,
     *   recordingStartMs?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->addTime = $values['addTime'];
        $this->apiId = $values['apiId'];
        $this->callUuid = $values['callUuid'];
        $this->conferenceName = $values['conferenceName'] ?? null;
        $this->fromNumber = $values['fromNumber'];
        $this->monthlyRecordingStorageAmount = $values['monthlyRecordingStorageAmount'];
        $this->recordingDurationMs = $values['recordingDurationMs'];
        $this->recordingEndMs = $values['recordingEndMs'] ?? null;
        $this->recordingFormat = $values['recordingFormat'];
        $this->recordingId = $values['recordingId'];
        $this->recordingStartMs = $values['recordingStartMs'] ?? null;
        $this->recordingStorageDuration = $values['recordingStorageDuration'];
        $this->recordingStorageRate = $values['recordingStorageRate'];
        $this->recordingType = $values['recordingType'];
        $this->recordingUrl = $values['recordingUrl'];
        $this->resourceUri = $values['resourceUri'];
        $this->roundedRecordingDuration = $values['roundedRecordingDuration'];
        $this->toNumber = $values['toNumber'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
