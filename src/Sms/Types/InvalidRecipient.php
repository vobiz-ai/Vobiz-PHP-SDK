<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * A row that was rejected during a recipient upload and not stored.
 */
class InvalidRecipient extends JsonSerializableType
{
    /**
     * @var ?int $row Where the row came from: the line number in the file (the header is line 1), or the 1-based position in a JSON `numbers` array.
     */
    #[JsonProperty('row')]
    public ?int $row;

    /**
     * @var ?string $value The phone value exactly as it appeared in the row. Empty when the phone cell was blank.
     */
    #[JsonProperty('value')]
    public ?string $value;

    /**
     * @var ?value-of<InvalidRecipientReason> $reason Why the number was rejected: `missing phone number` (blank cell), `contains letters or symbols`, `too short`, `too long`, `not a valid US/Canada number`, `not a valid Indian mobile number` or `unsupported defaultCountry`.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @param array{
     *   row?: ?int,
     *   value?: ?string,
     *   reason?: ?value-of<InvalidRecipientReason>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->row = $values['row'] ?? null;
        $this->value = $values['value'] ?? null;
        $this->reason = $values['reason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
