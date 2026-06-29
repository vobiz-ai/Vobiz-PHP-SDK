<?php

namespace Vobiz\Account\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class RetrieveAccountResponseFeatures extends JsonSerializableType
{
    /**
     * @var bool $callQueue
     */
    #[JsonProperty('call_queue')]
    public bool $callQueue;

    /**
     * @param array{
     *   callQueue: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->callQueue = $values['callQueue'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
