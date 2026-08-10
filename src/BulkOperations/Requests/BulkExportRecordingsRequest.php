<?php

namespace Vobiz\BulkOperations\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\BulkOperations\Types\BulkExportRecordingsRequestRecipient;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\BulkOperations\Types\BulkExportRecordingsRequestRecordingFormat;

class BulkExportRecordingsRequest extends JsonSerializableType
{
    /**
     * @var BulkExportRecordingsRequestRecipient $recipient Email delivery targets for the export archive.
     */
    #[JsonProperty('recipient')]
    public BulkExportRecordingsRequestRecipient $recipient;

    /**
     * @var ?string $from Start date for the export. Format: YYYY-MM-DD HH:MM:SS. Defaults to 7 days ago.
     */
    #[JsonProperty('from')]
    public ?string $from;

    /**
     * @var ?string $to End date for the export. Format: YYYY-MM-DD HH:MM:SS. Defaults to the current time.
     */
    #[JsonProperty('to')]
    public ?string $to;

    /**
     * @var ?string $recordingStorageDuration Export recordings exactly N days old. `"7"` exports recordings from exactly 7 days ago.
     */
    #[JsonProperty('recording_storage_duration')]
    public ?string $recordingStorageDuration;

    /**
     * @var ?string $recordingStorageDurationGte Export recordings N days old or older. `"7"` exports recordings 7 days old and older.
     */
    #[JsonProperty('recording_storage_duration__gte')]
    public ?string $recordingStorageDurationGte;

    /**
     * @var ?string $recordingStorageDurationGt Export recordings older than N days. `"7"` exports recordings 8 days old and older.
     */
    #[JsonProperty('recording_storage_duration__gt')]
    public ?string $recordingStorageDurationGt;

    /**
     * @var ?string $recordingStorageDurationLte Export recordings N days old or newer. `"30"` exports recordings 0-30 days old.
     */
    #[JsonProperty('recording_storage_duration__lte')]
    public ?string $recordingStorageDurationLte;

    /**
     * @var ?string $recordingStorageDurationLt Export recordings newer than N days. `"30"` exports recordings 0-29 days old.
     */
    #[JsonProperty('recording_storage_duration__lt')]
    public ?string $recordingStorageDurationLt;

    /**
     * @var ?string $fromNumber Filter by caller phone number. Applies when the range is 30 days or less.
     */
    #[JsonProperty('from_number')]
    public ?string $fromNumber;

    /**
     * @var ?string $toNumber Filter by destination phone number. Applies when the range is 30 days or less.
     */
    #[JsonProperty('to_number')]
    public ?string $toNumber;

    /**
     * @var ?string $callUuid Filter by call UUID. Also use this field for a conference_uuid or mpc_uuid. Applies when the range is 30 days or less.
     */
    #[JsonProperty('call_uuid')]
    public ?string $callUuid;

    /**
     * @var ?string $conferenceName Filter by conference name. Also use this field for an mpc_name. Applies when the range is 30 days or less.
     */
    #[JsonProperty('conference_name')]
    public ?string $conferenceName;

    /**
     * @var ?value-of<BulkExportRecordingsRequestRecordingFormat> $recordingFormat Filter by recording format. Applies when the range is 30 days or less.
     */
    #[JsonProperty('recording_format')]
    public ?string $recordingFormat;

    /**
     * @var ?string $recordingId Filter by a specific recording ID. Applies when the range is 30 days or less.
     */
    #[JsonProperty('recording_id')]
    public ?string $recordingId;

    /**
     * @param array{
     *   recipient: BulkExportRecordingsRequestRecipient,
     *   from?: ?string,
     *   to?: ?string,
     *   recordingStorageDuration?: ?string,
     *   recordingStorageDurationGte?: ?string,
     *   recordingStorageDurationGt?: ?string,
     *   recordingStorageDurationLte?: ?string,
     *   recordingStorageDurationLt?: ?string,
     *   fromNumber?: ?string,
     *   toNumber?: ?string,
     *   callUuid?: ?string,
     *   conferenceName?: ?string,
     *   recordingFormat?: ?value-of<BulkExportRecordingsRequestRecordingFormat>,
     *   recordingId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->recipient = $values['recipient'];
        $this->from = $values['from'] ?? null;
        $this->to = $values['to'] ?? null;
        $this->recordingStorageDuration = $values['recordingStorageDuration'] ?? null;
        $this->recordingStorageDurationGte = $values['recordingStorageDurationGte'] ?? null;
        $this->recordingStorageDurationGt = $values['recordingStorageDurationGt'] ?? null;
        $this->recordingStorageDurationLte = $values['recordingStorageDurationLte'] ?? null;
        $this->recordingStorageDurationLt = $values['recordingStorageDurationLt'] ?? null;
        $this->fromNumber = $values['fromNumber'] ?? null;
        $this->toNumber = $values['toNumber'] ?? null;
        $this->callUuid = $values['callUuid'] ?? null;
        $this->conferenceName = $values['conferenceName'] ?? null;
        $this->recordingFormat = $values['recordingFormat'] ?? null;
        $this->recordingId = $values['recordingId'] ?? null;
    }
}
