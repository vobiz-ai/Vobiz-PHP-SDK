<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * The messaging numbers on your account.
 */
class SmsNumberList extends JsonSerializableType
{
    /**
     * @var ?array<SmsNumber> $numbers Numbers routed for SMS or MMS, sorted by `countryCode` and then `e164`. Empty array when you have no messaging numbers.
     */
    #[JsonProperty('numbers'), ArrayType([SmsNumber::class])]
    public ?array $numbers;

    /**
     * @param array{
     *   numbers?: ?array<SmsNumber>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->numbers = $values['numbers'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
