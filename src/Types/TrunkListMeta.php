<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Pagination metadata returned in the `meta` object of the trunk, credential, IP ACL and origination URI list endpoints.
 */
class TrunkListMeta extends JsonSerializableType
{
    /**
     * @var int $limit Maximum number of items in `objects` for this response.
     */
    #[JsonProperty('limit')]
    public int $limit;

    /**
     * @var int $offset Zero-based position of the first item in `objects`.
     */
    #[JsonProperty('offset')]
    public int $offset;

    /**
     * @var int $total Total number of items on the account.
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
