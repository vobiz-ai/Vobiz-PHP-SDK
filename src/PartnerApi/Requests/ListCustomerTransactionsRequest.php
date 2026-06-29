<?php

namespace Vobiz\PartnerApi\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use DateTime;
use Vobiz\PartnerApi\Types\ListCustomerTransactionsRequestTransactionType;

class ListCustomerTransactionsRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $fromDate
     */
    public ?DateTime $fromDate;

    /**
     * @var ?DateTime $toDate
     */
    public ?DateTime $toDate;

    /**
     * @var ?value-of<ListCustomerTransactionsRequestTransactionType> $transactionType
     */
    public ?string $transactionType;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $perPage
     */
    public ?int $perPage;

    /**
     * @param array{
     *   fromDate?: ?DateTime,
     *   toDate?: ?DateTime,
     *   transactionType?: ?value-of<ListCustomerTransactionsRequestTransactionType>,
     *   page?: ?int,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fromDate = $values['fromDate'] ?? null;
        $this->toDate = $values['toDate'] ?? null;
        $this->transactionType = $values['transactionType'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }
}
