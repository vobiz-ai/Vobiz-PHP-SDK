<?php

namespace Vobiz\SubAccountKyc\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class VerifySubaccountGstRequest extends JsonSerializableType
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
