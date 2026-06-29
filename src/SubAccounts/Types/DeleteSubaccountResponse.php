<?php

namespace Vobiz\SubAccounts\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class DeleteSubaccountResponse extends JsonSerializableType
{
    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   message: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
