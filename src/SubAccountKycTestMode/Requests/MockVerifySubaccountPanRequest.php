<?php

namespace Vobiz\SubAccountKycTestMode\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class MockVerifySubaccountPanRequest extends JsonSerializableType
{
    /**
     * @var string $pan
     */
    #[JsonProperty('pan')]
    public string $pan;

    /**
     * @param array{
     *   pan: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pan = $values['pan'];
    }
}
