<?php

namespace Vobiz\Cdr\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListRecentCdrsRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Number of recent CDRs to return.
     */
    public ?int $limit;

    /**
     * @param array{
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
    }
}
