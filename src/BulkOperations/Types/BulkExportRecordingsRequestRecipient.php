<?php

namespace Vobiz\BulkOperations\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * Email delivery targets for the export archive.
 */
class BulkExportRecordingsRequestRecipient extends JsonSerializableType
{
    /**
     * @var array<string> $customerAccount Email addresses that receive the download link. All addresses must be in valid format.
     */
    #[JsonProperty('customer_account'), ArrayType(['string'])]
    public array $customerAccount;

    /**
     * @param array{
     *   customerAccount: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerAccount = $values['customerAccount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
