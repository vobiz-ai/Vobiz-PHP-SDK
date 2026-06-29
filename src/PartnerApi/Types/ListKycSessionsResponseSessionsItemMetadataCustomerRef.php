<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListKycSessionsResponseSessionsItemMetadataCustomerRef extends JsonSerializableType
{
    /**
     * @var string $plan
     */
    #[JsonProperty('plan')]
    public string $plan;

    /**
     * @var string $customerRef
     */
    #[JsonProperty('customer_ref')]
    public string $customerRef;

    /**
     * @param array{
     *   plan: string,
     *   customerRef: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->plan = $values['plan'];
        $this->customerRef = $values['customerRef'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
