<?php

namespace Vobiz\PhoneNumbers\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CancelNumberReleaseResponse extends JsonSerializableType
{
    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var value-of<CancelNumberReleaseResponseStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?float $refundAmount
     */
    #[JsonProperty('refund_amount')]
    public ?float $refundAmount;

    /**
     * @var ?value-of<CancelNumberReleaseResponseRefundStatus> $refundStatus
     */
    #[JsonProperty('refund_status')]
    public ?string $refundStatus;

    /**
     * @var ?string $refundError Present when the refund could not be processed.
     */
    #[JsonProperty('refund_error')]
    public ?string $refundError;

    /**
     * @param array{
     *   message: string,
     *   status: value-of<CancelNumberReleaseResponseStatus>,
     *   currency?: ?string,
     *   refundAmount?: ?float,
     *   refundStatus?: ?value-of<CancelNumberReleaseResponseRefundStatus>,
     *   refundError?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
        $this->status = $values['status'];
        $this->currency = $values['currency'] ?? null;
        $this->refundAmount = $values['refundAmount'] ?? null;
        $this->refundStatus = $values['refundStatus'] ?? null;
        $this->refundError = $values['refundError'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
