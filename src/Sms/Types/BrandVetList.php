<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * One page of the brand's vetting records from the US 10DLC registry.
 */
class BrandVetList extends JsonSerializableType
{
    /**
     * @var ?array<array<string, mixed>> $results Vetting records on this page, passed through from the registry as received. Empty when the brand has never been vetted.
     */
    #[JsonProperty('results'), ArrayType([['string' => 'mixed']])]
    public ?array $results;

    /**
     * @var ?BrandVetPaging $paging Where this page sits in the full result set.
     */
    #[JsonProperty('paging')]
    public ?BrandVetPaging $paging;

    /**
     * @param array{
     *   results?: ?array<array<string, mixed>>,
     *   paging?: ?BrandVetPaging,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->results = $values['results'] ?? null;
        $this->paging = $values['paging'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
