<?php

namespace Vobiz\Balance\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Balance\Types\ListTransactionsRequestStatus;

class ListTransactionsRequest extends JsonSerializableType
{
    /**
     * @var ?int $page Page number, 1-indexed.
     */
    public ?int $page;

    /**
     * @var ?int $perPage Records per page. A value above the maximum falls back to the default of 50 rather than clamping.
     */
    public ?int $perPage;

    /**
     * @var ?string $fromDate Start of the window, inclusive. Date-only or full ISO 8601 timestamp. Day boundaries are UTC.
     */
    public ?string $fromDate;

    /**
     * @var ?string $toDate End of the window, inclusive. A date-only value covers the whole day.
     */
    public ?string $toDate;

    /**
     * @var ?string $type `credit` or `debit` act as broad classifications and sweep in legacy entry types such as `did_rental`; any other value is an exact match on `transactions[].type`.
     */
    public ?string $type;

    /**
     * @var ?value-of<ListTransactionsRequestStatus> $status Exact match on transaction status.
     */
    public ?string $status;

    /**
     * @var ?string $currency Currency code. Uppercased server-side, exact match.
     */
    public ?string $currency;

    /**
     * @var ?string $referenceType Spend source, matching `transactions[].reference_type`.
     */
    public ?string $referenceType;

    /**
     * @var ?string $description Case-insensitive substring match on the description.
     */
    public ?string $description;

    /**
     * @var ?string $reference Case-insensitive substring match on the reference.
     */
    public ?string $reference;

    /**
     * @var ?string $transactionId Fetch a single ledger entry by its UUID.
     */
    public ?string $transactionId;

    /**
     * @param array{
     *   page?: ?int,
     *   perPage?: ?int,
     *   fromDate?: ?string,
     *   toDate?: ?string,
     *   type?: ?string,
     *   status?: ?value-of<ListTransactionsRequestStatus>,
     *   currency?: ?string,
     *   referenceType?: ?string,
     *   description?: ?string,
     *   reference?: ?string,
     *   transactionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->fromDate = $values['fromDate'] ?? null;
        $this->toDate = $values['toDate'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->referenceType = $values['referenceType'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->reference = $values['reference'] ?? null;
        $this->transactionId = $values['transactionId'] ?? null;
    }
}
