<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * The hours during which messages may be sent to the country. Each value is a text range with its timezone rule, for example `MON - FRI: 10:00:00 - 21:00:00; Timezone from MSISDN`, which means the recipient's local time.
 */
class CoverageSendWindow extends JsonSerializableType
{
    /**
     * @var ?string $weekday Permitted sending hours Monday to Friday, with the timezone rule.
     */
    #[JsonProperty('weekday')]
    public ?string $weekday;

    /**
     * @var ?string $saturday Permitted sending hours on Saturday, with the timezone rule.
     */
    #[JsonProperty('saturday')]
    public ?string $saturday;

    /**
     * @var ?string $sunday Permitted sending hours on Sunday, with the timezone rule.
     */
    #[JsonProperty('sunday')]
    public ?string $sunday;

    /**
     * @param array{
     *   weekday?: ?string,
     *   saturday?: ?string,
     *   sunday?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->weekday = $values['weekday'] ?? null;
        $this->saturday = $values['saturday'] ?? null;
        $this->sunday = $values['sunday'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
