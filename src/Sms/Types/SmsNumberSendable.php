<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Where a number can send right now, derived from its country and registration state. Check it before you send.
 */
class SmsNumberSendable extends JsonSerializableType
{
    /**
     * @var ?bool $international `true` when the number can send to recipients outside the US.
     */
    #[JsonProperty('international')]
    public ?bool $international;

    /**
     * @var ?bool $usDomestic `true` when the number can send to US recipients. A US number needs an approved 10DLC campaign or completed toll-free verification before this becomes `true`.
     */
    #[JsonProperty('usDomestic')]
    public ?bool $usDomestic;

    /**
     * @param array{
     *   international?: ?bool,
     *   usDomestic?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->international = $values['international'] ?? null;
        $this->usDomestic = $values['usDomestic'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
