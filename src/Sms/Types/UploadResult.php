<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * Summary of a recipient upload. The upload replaces the broadcast's previous recipient list.
 */
class UploadResult extends JsonSerializableType
{
    /**
     * @var ?int $total Rows read from the file or array, excluding the header line.
     */
    #[JsonProperty('total')]
    public ?int $total;

    /**
     * @var ?int $valid Rows with a valid, unique number that were stored as recipients, including opted-out numbers.
     */
    #[JsonProperty('valid')]
    public ?int $valid;

    /**
     * @var ?array<InvalidRecipient> $invalid Rejected rows with the reason for each, at most the first 100. Fix them in your file and upload again.
     */
    #[JsonProperty('invalid'), ArrayType([InvalidRecipient::class])]
    public ?array $invalid;

    /**
     * @var ?int $invalidCount Total rejected rows, including any beyond the 100 listed in `invalid`.
     */
    #[JsonProperty('invalidCount')]
    public ?int $invalidCount;

    /**
     * @var ?int $duplicates Rows dropped because the same number appeared earlier in the upload.
     */
    #[JsonProperty('duplicates')]
    public ?int $duplicates;

    /**
     * @var ?int $optedOut Stored rows marked `opted_out` because the number opted out of SMS from you. They count towards `valid` and are never sent.
     */
    #[JsonProperty('optedOut')]
    public ?int $optedOut;

    /**
     * @var ?array<string> $columns Column names detected in the upload, as written in your header. The first is the phone column; the rest are template variables.
     */
    #[JsonProperty('columns'), ArrayType(['string'])]
    public ?array $columns;

    /**
     * @param array{
     *   total?: ?int,
     *   valid?: ?int,
     *   invalid?: ?array<InvalidRecipient>,
     *   invalidCount?: ?int,
     *   duplicates?: ?int,
     *   optedOut?: ?int,
     *   columns?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->total = $values['total'] ?? null;
        $this->valid = $values['valid'] ?? null;
        $this->invalid = $values['invalid'] ?? null;
        $this->invalidCount = $values['invalidCount'] ?? null;
        $this->duplicates = $values['duplicates'] ?? null;
        $this->optedOut = $values['optedOut'] ?? null;
        $this->columns = $values['columns'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
