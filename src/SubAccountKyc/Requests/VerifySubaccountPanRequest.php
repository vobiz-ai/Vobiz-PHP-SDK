<?php

namespace Vobiz\SubAccountKyc\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class VerifySubaccountPanRequest extends JsonSerializableType
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
