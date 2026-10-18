<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * A contact phone number shown on an RCS sender's info page.
 */
class SenderPhone extends JsonSerializableType
{
    /**
     * @var ?string $phoneNumber The phone number recipients can call, in E.164 format.
     */
    #[JsonProperty('phoneNumber')]
    public ?string $phoneNumber;

    /**
     * @var ?string $label Text shown next to the number, for example `Customer care`.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @param array{
     *   phoneNumber?: ?string,
     *   label?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->label = $values['label'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
