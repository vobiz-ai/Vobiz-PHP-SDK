<?php

namespace Vobiz\Trunks\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListTrunksResponseMeta extends JsonSerializableType
{
    /**
     * @var int $limit
     */
    #[JsonProperty('limit')]
    public int $limit;

    /**
     * @var int $offset
     */
    #[JsonProperty('offset')]
    public int $offset;

    /**
     * @var int $total
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @param array{
     *   limit: int,
     *   offset: int,
     *   total: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->limit = $values['limit'];
        $this->offset = $values['offset'];
        $this->total = $values['total'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
