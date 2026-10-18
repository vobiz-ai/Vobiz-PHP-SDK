<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Counts of the broadcast's stored recipients by state, recounted every time you read the broadcast.
 */
class BroadcastStats extends JsonSerializableType
{
    /**
     * @var ?int $total Recipients stored on the broadcast, including opted-out ones. Invalid rows and duplicates from the upload are not stored and not counted.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $pending Recipients still waiting to be sent.
     */
    #[JsonProperty('pending')]
    public ?int $pending;

    /**
     * @var ?int $sent Recipients whose message was accepted for sending and has no delivery report yet.
     */
    #[JsonProperty('sent')]
    public ?int $sent;

    /**
     * @var ?int $delivered Recipients whose message was reported delivered.
     */
    #[JsonProperty('delivered')]
    public ?int $delivered;

    /**
     * @var ?int $failed Recipients whose message failed. Their `errorCode` says why.
     */
    #[JsonProperty('failed')]
    public ?int $failed;

    /**
     * @var ?int $optedOut Recipients excluded because the number opted out of SMS from you. They are never sent.
     */
    #[JsonProperty('optedOut')]
    public ?int $optedOut;

    /**
     * @var ?int $skipped Recipients that were still pending when the broadcast was cancelled.
     */
    #[JsonProperty('skipped')]
    public ?int $skipped;

    /**
     * @param array{
     *   total?: ?int,
     *   pending?: ?int,
     *   sent?: ?int,
     *   delivered?: ?int,
     *   failed?: ?int,
     *   optedOut?: ?int,
     *   skipped?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->total = $values['total'] ?? null;
        $this->pending = $values['pending'] ?? null;
        $this->sent = $values['sent'] ?? null;
        $this->delivered = $values['delivered'] ?? null;
        $this->failed = $values['failed'] ?? null;
        $this->optedOut = $values['optedOut'] ?? null;
        $this->skipped = $values['skipped'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
