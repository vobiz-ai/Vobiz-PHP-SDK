<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateKycSessionRequestReminderScheduleItem extends JsonSerializableType
{
    /**
     * @var ?value-of<CreateKycSessionRequestReminderScheduleItemTrigger> $trigger
     */
    #[JsonProperty('trigger')]
    public ?string $trigger;

    /**
     * @var ?int $value
     */
    #[JsonProperty('value')]
    public ?int $value;

    /**
     * @param array{
     *   trigger?: ?value-of<CreateKycSessionRequestReminderScheduleItemTrigger>,
     *   value?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->trigger = $values['trigger'] ?? null;
        $this->value = $values['value'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
