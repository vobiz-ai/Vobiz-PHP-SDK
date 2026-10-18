<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * One page of a broadcast's recipients, in upload order, with the count that matches your filter.
 */
class BroadcastRecipientList extends JsonSerializableType
{
    /**
     * @var ?array<BroadcastRecipient> $recipients The recipients on this page, in upload order.
     */
    #[JsonProperty('recipients'), ArrayType([BroadcastRecipient::class])]
    public ?array $recipients;

    /**
     * @var ?int $total Number of recipients that match the `status` filter across all pages, or all recipients when you pass no filter.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @param array{
     *   recipients?: ?array<BroadcastRecipient>,
     *   total?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->recipients = $values['recipients'] ?? null;
        $this->total = $values['total'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
