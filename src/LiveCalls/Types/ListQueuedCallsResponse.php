<?php

namespace Vobiz\LiveCalls\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListQueuedCallsResponse extends JsonSerializableType
{
    /**
     * @var string $apiId Unique identifier for this API request
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var array<string> $calls Array of call UUIDs for all queued calls (max 20)
     */
    #[JsonProperty('calls'), ArrayType(['string'])]
    public array $calls;

    /**
     * @param array{
     *   apiId: string,
     *   calls: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiId = $values['apiId'];
        $this->calls = $values['calls'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
