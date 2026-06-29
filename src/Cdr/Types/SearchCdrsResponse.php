<?php

namespace Vobiz\Cdr\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class SearchCdrsResponse extends JsonSerializableType
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
     * @var array<SearchCdrsResponseDataItem> $data
     */
    #[JsonProperty('data'), ArrayType([SearchCdrsResponseDataItem::class])]
    public array $data;

    /**
     * @var SearchCdrsResponseFilters $filters
     */
    #[JsonProperty('filters')]
    public SearchCdrsResponseFilters $filters;

    /**
     * @var SearchCdrsResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public SearchCdrsResponsePagination $pagination;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var SearchCdrsResponseSummary $summary
     */
    #[JsonProperty('summary')]
    public SearchCdrsResponseSummary $summary;

    /**
     * @param array{
     *   accountId: string,
     *   count: int,
     *   data: array<SearchCdrsResponseDataItem>,
     *   filters: SearchCdrsResponseFilters,
     *   pagination: SearchCdrsResponsePagination,
     *   success: bool,
     *   summary: SearchCdrsResponseSummary,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accountId = $values['accountId'];
        $this->count = $values['count'];
        $this->data = $values['data'];
        $this->filters = $values['filters'];
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
