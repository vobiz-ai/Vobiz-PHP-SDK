<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * One page of broadcasts, newest first, with the total count for paging.
 */
class BroadcastList extends JsonSerializableType
{
    /**
     * @var ?array<Broadcast> $broadcasts The broadcasts on this page, newest first. Empty when `offset` is past the end.
     */
    #[JsonProperty('broadcasts'), ArrayType([Broadcast::class])]
    public ?array $broadcasts;

    /**
     * @var ?int $total Number of broadcasts on your account across all pages. Page until `offset` reaches this value.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @param array{
     *   broadcasts?: ?array<Broadcast>,
     *   total?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->broadcasts = $values['broadcasts'] ?? null;
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
