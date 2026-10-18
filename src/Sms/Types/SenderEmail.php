<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * A contact email address shown on an RCS sender's info page.
 */
class SenderEmail extends JsonSerializableType
{
    /**
     * @var ?string $address The email address recipients can write to, for example `support@example.com`.
     */
    #[JsonProperty('address')]
    public ?string $address;

    /**
     * @var ?string $label Text shown next to the address, for example `Support`.
     */
    #[JsonProperty('label')]
    public ?string $label;

    /**
     * @param array{
     *   address?: ?string,
     *   label?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->address = $values['address'] ?? null;
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
