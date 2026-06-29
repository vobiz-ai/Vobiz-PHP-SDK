<?php

namespace Vobiz\Trunks\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class UpdateTrunkRequest extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var int $maxConcurrentCalls
     */
    #[JsonProperty('max_concurrent_calls')]
    public int $maxConcurrentCalls;

    /**
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @param array{
     *   name: string,
     *   maxConcurrentCalls: int,
     *   enabled: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->maxConcurrentCalls = $values['maxConcurrentCalls'];
        $this->enabled = $values['enabled'];
    }
}
