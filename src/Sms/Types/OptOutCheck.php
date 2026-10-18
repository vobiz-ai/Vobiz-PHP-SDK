<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Whether a phone number is on your opt-out list for the channel you asked about.
 */
class OptOutCheck extends JsonSerializableType
{
    /**
     * @var ?bool $optedOut `true` when the number is blocked on the requested channel, so sends to it return `422`. `false` when you can message it.
     */
    #[JsonProperty('optedOut')]
    public ?bool $optedOut;

    /**
     * @param array{
     *   optedOut?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->optedOut = $values['optedOut'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
