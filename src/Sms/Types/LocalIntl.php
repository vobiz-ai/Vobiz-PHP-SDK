<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

/**
 * A coverage rule that can differ for local (in-country) and international senders. Each value is `true`, `false`, or `null` when unknown.
 */
class LocalIntl extends JsonSerializableType
{
    /**
     * @var ?bool $local Value of the rule for local (in-country) traffic. `null` when unknown.
     */
    #[JsonProperty('local')]
    public ?bool $local;

    /**
     * @var ?bool $international Value of the rule for international traffic, sent from outside the country. `null` when unknown.
     */
    #[JsonProperty('international')]
    public ?bool $international;

    /**
     * @param array{
     *   local?: ?bool,
     *   international?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->local = $values['local'] ?? null;
        $this->international = $values['international'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
