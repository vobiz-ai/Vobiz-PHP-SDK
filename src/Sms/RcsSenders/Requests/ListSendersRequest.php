<?php

namespace Vobiz\Sms\RcsSenders\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListSendersRequest extends JsonSerializableType
{
    /**
     * @var ?int $limit Maximum number of items to return, from 1 to 100. Defaults to 20; a value outside that range or a non-integer is replaced by the default.
     */
    public ?int $limit;

    /**
     * @var ?int $offset Number of items to skip before the page starts. Defaults to `0`. Pass a whole number of 0 or more.
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
