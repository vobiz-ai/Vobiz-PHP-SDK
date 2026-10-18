<?php

namespace Vobiz\Sms\OptOuts\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListOptOutsRequest extends JsonSerializableType
{
    /**
     * @var int $limit Required. Maximum number of opt-outs to return, `1` or greater. Without it the response is `null`.
     */
    public int $limit;

    /**
     * @var int $offset Required. Number of records to skip before the page starts. Pass `0` for the first page, then add `limit` for each following page.
     */
    public int $offset;

    /**
     * @param array{
     *   limit: int,
     *   offset: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->limit = $values['limit'];
        $this->offset = $values['offset'];
    }
}
