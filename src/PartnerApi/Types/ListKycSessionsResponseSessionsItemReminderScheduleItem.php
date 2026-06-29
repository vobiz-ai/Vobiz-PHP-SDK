<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class ListKycSessionsResponseSessionsItemReminderScheduleItem extends JsonSerializableType
{
    /**
     * @var int $value
     */
    #[JsonProperty('value')]
    public int $value;

    /**
     * @var string $trigger
     */
    #[JsonProperty('trigger')]
    public string $trigger;

    /**
     * @param array{
     *   value: int,
     *   trigger: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->value = $values['value'];
        $this->trigger = $values['trigger'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
