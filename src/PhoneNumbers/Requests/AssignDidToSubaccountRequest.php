<?php

namespace Vobiz\PhoneNumbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class AssignDidToSubaccountRequest extends JsonSerializableType
{
    /**
     * @var string $subAccountId
     */
    #[JsonProperty('sub_account_id')]
    public string $subAccountId;

    /**
     * @param array{
     *   subAccountId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subAccountId = $values['subAccountId'];
    }
}
