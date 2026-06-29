<?php

namespace Vobiz\Balance\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListTransactionsResponseTransactionsItem extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $accountId
     */
    #[JsonProperty('account_id')]
    public string $accountId;

    /**
     * @var string $balanceId
     */
    #[JsonProperty('balance_id')]
    public string $balanceId;

    /**
     * @var string $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var float $amount
     */
    #[JsonProperty('amount')]
    public float $amount;

    /**
     * @var string $currency
     */
    #[JsonProperty('currency')]
    public string $currency;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $reference
     */
    #[JsonProperty('reference')]
    public string $reference;

    /**
     * @var ?string $referenceType
     */
    #[JsonProperty('reference_type')]
    public ?string $referenceType;

    /**
     * @var string $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var string $processedAt
     */
    #[JsonProperty('processed_at')]
    public string $processedAt;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   accountId: string,
     *   balanceId: string,
     *   type: string,
     *   amount: float,
     *   currency: string,
     *   description: string,
     *   reference: string,
     *   status: string,
     *   processedAt: string,
     *   createdAt: string,
     *   updatedAt: string,
     *   referenceType?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->accountId = $values['accountId'];
        $this->balanceId = $values['balanceId'];
        $this->type = $values['type'];
        $this->amount = $values['amount'];
        $this->currency = $values['currency'];
        $this->description = $values['description'];
        $this->reference = $values['reference'];
        $this->referenceType = $values['referenceType'] ?? null;
        $this->status = $values['status'];
        $this->processedAt = $values['processedAt'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
