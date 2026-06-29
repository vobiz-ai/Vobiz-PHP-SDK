<?php

namespace Vobiz\Cdr\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class SearchCdrsResponseFilters extends JsonSerializableType
{
    /**
     * @var string $callDirection
     */
    #[JsonProperty('call_direction')]
    public string $callDirection;

    /**
     * @var string $fromNumber
     */
    #[JsonProperty('from_number')]
    public string $fromNumber;

    /**
     * @var string $hangupCause
     */
    #[JsonProperty('hangup_cause')]
    public string $hangupCause;

    /**
     * @var string $toNumber
     */
    #[JsonProperty('to_number')]
    public string $toNumber;

    /**
     * @param array{
     *   callDirection: string,
     *   fromNumber: string,
     *   hangupCause: string,
     *   toNumber: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->callDirection = $values['callDirection'];
        $this->fromNumber = $values['fromNumber'];
        $this->hangupCause = $values['hangupCause'];
        $this->toNumber = $values['toNumber'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
