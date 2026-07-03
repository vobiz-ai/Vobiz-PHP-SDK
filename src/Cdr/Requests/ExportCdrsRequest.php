<?php

namespace Vobiz\Cdr\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use DateTime;
use Vobiz\Cdr\Types\ExportCdrsRequestCallDirection;

class ExportCdrsRequest extends JsonSerializableType
{
    /**
     * @var ?string $fromNumber Filter by the originating phone number (caller).
     */
    public ?string $fromNumber;

    /**
     * @var ?string $toNumber Filter by the destination phone number (callee).
     */
    public ?string $toNumber;

    /**
     * @var ?DateTime $startDate Beginning of the search period (YYYY-MM-DD). Required when using `end_date`.
     */
    public ?DateTime $startDate;

    /**
     * @var ?DateTime $endDate End of the search period (YYYY-MM-DD). Required when using `start_date`.
     */
    public ?DateTime $endDate;

    /**
     * @var ?value-of<ExportCdrsRequestCallDirection> $callDirection Filter by direction.
     */
    public ?string $callDirection;

    /**
     * @var ?int $minDuration Minimum call duration in seconds. Excludes calls shorter than this value.
     */
    public ?int $minDuration;

    /**
     * @var ?string $sipCallId Filter by the SIP Call-ID of the call (matches the cdr's sip_call_id field).
     */
    public ?string $sipCallId;

    /**
     * @var ?string $bridgeUuid Filter by the UUID of the bridged leg (matches the cdr's bridge_uuid field).
     */
    public ?string $bridgeUuid;

    /**
     * @var ?string $hangupCause Filter by telephony hangup cause, e.g. NORMAL_CLEARING.
     */
    public ?string $hangupCause;

    /**
     * @var ?string $hangupDisposition Filter by how the leg was released, e.g. send_refuse.
     */
    public ?string $hangupDisposition;

    /**
     * @var ?string $context Filter by the call context, e.g. sip-trunking.
     */
    public ?string $context;

    /**
     * @var ?string $campaignId Filter by the campaign identifier associated with the call.
     */
    public ?string $campaignId;

    /**
     * @var ?string $search Free-text search across CDR fields (numbers, IDs, etc.).
     */
    public ?string $search;

    /**
     * @param array{
     *   fromNumber?: ?string,
     *   toNumber?: ?string,
     *   startDate?: ?DateTime,
     *   endDate?: ?DateTime,
     *   callDirection?: ?value-of<ExportCdrsRequestCallDirection>,
     *   minDuration?: ?int,
     *   sipCallId?: ?string,
     *   bridgeUuid?: ?string,
     *   hangupCause?: ?string,
     *   hangupDisposition?: ?string,
     *   context?: ?string,
     *   campaignId?: ?string,
     *   search?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fromNumber = $values['fromNumber'] ?? null;
        $this->toNumber = $values['toNumber'] ?? null;
        $this->startDate = $values['startDate'] ?? null;
        $this->endDate = $values['endDate'] ?? null;
        $this->callDirection = $values['callDirection'] ?? null;
        $this->minDuration = $values['minDuration'] ?? null;
        $this->sipCallId = $values['sipCallId'] ?? null;
        $this->bridgeUuid = $values['bridgeUuid'] ?? null;
        $this->hangupCause = $values['hangupCause'] ?? null;
        $this->hangupDisposition = $values['hangupDisposition'] ?? null;
        $this->context = $values['context'] ?? null;
        $this->campaignId = $values['campaignId'] ?? null;
        $this->search = $values['search'] ?? null;
    }
}
