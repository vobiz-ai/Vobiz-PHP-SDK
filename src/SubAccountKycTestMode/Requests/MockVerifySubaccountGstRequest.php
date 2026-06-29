<?php

namespace Vobiz\SubAccountKycTestMode\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class MockVerifySubaccountGstRequest extends JsonSerializableType
{
    /**
     * @var string $gstin
     */
    #[JsonProperty('gstin')]
    public string $gstin;

    /**
     * @param array{
     *   gstin: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->gstin = $values['gstin'];
    }
}
