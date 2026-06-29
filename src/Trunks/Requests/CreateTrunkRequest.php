<?php

namespace Vobiz\Trunks\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateTrunkRequest extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $trunkType
     */
    #[JsonProperty('trunk_type')]
    public string $trunkType;

    /**
     * @var int $maxConcurrentCalls
     */
    #[JsonProperty('max_concurrent_calls')]
    public int $maxConcurrentCalls;

    /**
     * @param array{
     *   name: string,
     *   trunkType: string,
     *   maxConcurrentCalls: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->trunkType = $values['trunkType'];
        $this->maxConcurrentCalls = $values['maxConcurrentCalls'];
    }
}
