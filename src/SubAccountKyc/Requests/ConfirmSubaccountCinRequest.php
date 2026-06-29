<?php

namespace Vobiz\SubAccountKyc\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ConfirmSubaccountCinRequest extends JsonSerializableType
{
    /**
     * @var string $companyName
     */
    #[JsonProperty('company_name')]
    public string $companyName;

    /**
     * @var string $selectedCin
     */
    #[JsonProperty('selected_cin')]
    public string $selectedCin;

    /**
     * @param array{
     *   companyName: string,
     *   selectedCin: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->companyName = $values['companyName'];
        $this->selectedCin = $values['selectedCin'];
    }
}
