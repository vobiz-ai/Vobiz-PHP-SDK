<?php

namespace Vobiz\PhoneNumbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class UnrentNumberRequest extends JsonSerializableType
{
    /**
     * @var ?bool $immediate Skip the 24-hour cooldown and release the number immediately.
     */
    public ?bool $immediate;

    /**
     * @param array{
     *   immediate?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->immediate = $values['immediate'] ?? null;
    }
}
