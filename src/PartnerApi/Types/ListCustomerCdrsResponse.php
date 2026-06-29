<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListCustomerCdrsResponse extends JsonSerializableType
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
     * @var array<mixed> $data
     */
    #[JsonProperty('data'), ArrayType(['mixed'])]
    public array $data;

    /**
     * @var ListCustomerCdrsResponsePagination $pagination
     */
    #[JsonProperty('pagination')]
    public ListCustomerCdrsResponsePagination $pagination;

    /**
     * @var bool $success
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @var ListCustomerCdrsResponseSummary $summary
     */
    #[JsonProperty('summary')]
    public ListCustomerCdrsResponseSummary $summary;

    /**
     * @var string $accountAuthId
     */
    #[JsonProperty('account_auth_id')]
    public string $accountAuthId;

    /**
     * @param array{
     *   accountId: string,
     *   count: int,
     *   data: array<mixed>,
     *   pagination: ListCustomerCdrsResponsePagination,
     *   success: bool,
     *   summary: ListCustomerCdrsResponseSummary,
     *   accountAuthId: string,
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
        $this->accountAuthId = $values['accountAuthId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
