<?php

namespace Vobiz\Cdr\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use Vobiz\Types\CdrPagination;

class ListCdrsResponse extends JsonSerializableType
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
     * @var array<ListCdrsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([ListCdrsResponseDataItem::class])]
    public array $data;

    /**
     * @var CdrPagination $pagination
     */
    #[JsonProperty('pagination')]
    public CdrPagination $pagination;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var ListCdrsResponseSummary $summary
     */
    #[JsonProperty('summary')]
    public ListCdrsResponseSummary $summary;

    /**
     * @param array{
     *   accountId: string,
     *   count: int,
     *   data: array<ListCdrsResponseDataItem>,
     *   pagination: CdrPagination,
     *   success: bool,
     *   summary: ListCdrsResponseSummary,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountId = $values['accountId'];
        $this->count = $values['count'];
        $this->data = $values['data'];
        $this->pagination = $values['pagination'];
        $this->success = $values['success'];
        $this->summary = $values['summary'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
