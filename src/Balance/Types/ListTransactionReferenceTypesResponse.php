<?php

namespace Vobiz\Balance\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListTransactionReferenceTypesResponse extends JsonSerializableType
{
    /**
     * @var ?array<string> $referenceTypes
     */
    #[JsonProperty('reference_types'), ArrayType(['string'])]
    public ?array $referenceTypes;

    /**
     * @param array{
     *   referenceTypes?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->referenceTypes = $values['referenceTypes'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
