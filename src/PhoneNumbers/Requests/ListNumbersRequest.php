<?php

namespace Vobiz\PhoneNumbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListNumbersRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit
     */
    public ?int $limit;

    /**
     * @var ?int $offset
     */
    public ?int $offset;

    /**
     * @param array{
     *   limit?: ?int,
     *   offset?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
    }
}
