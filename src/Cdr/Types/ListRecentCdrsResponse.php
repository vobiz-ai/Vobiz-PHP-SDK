<?php

namespace Vobiz\Cdr\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListRecentCdrsResponse extends JsonSerializableType
{
    /**
     * @var string $accountId
     */
    #[JsonProperty('account_id')]
    public string $accountId;

    /**
     * @var int $count
     */
    #[JsonProperty('count')]
    public int $count;

    /**
     * @var array<ListRecentCdrsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([ListRecentCdrsResponseDataItem::class])]
    public array $data;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   accountId: string,
     *   count: int,
     *   data: array<ListRecentCdrsResponseDataItem>,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountId = $values['accountId'];
        $this->count = $values['count'];
        $this->data = $values['data'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
