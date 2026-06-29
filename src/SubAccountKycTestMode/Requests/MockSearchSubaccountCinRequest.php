<?php

namespace Vobiz\SubAccountKycTestMode\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class MockSearchSubaccountCinRequest extends JsonSerializableType
{
    /**
     * @var string $companyName
     */
    #[JsonProperty('company_name')]
    public string $companyName;

    /**
     * @param array{
     *   companyName: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyName = $values['companyName'];
    }
}
