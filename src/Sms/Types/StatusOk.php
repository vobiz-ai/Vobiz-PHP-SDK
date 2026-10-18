<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * Confirmation returned by actions that have no resource to return, such as marking a conversation read or creating or deleting an opt-out.
 */
class StatusOk extends JsonSerializableType
{
    /**
     * @var ?string $status Always `ok` when the action succeeded.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   status?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
