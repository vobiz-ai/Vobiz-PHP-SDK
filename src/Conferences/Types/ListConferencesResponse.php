<?php

namespace Vobiz\Conferences\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class ListConferencesResponse extends JsonSerializableType
{
    /**
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var array<mixed> $conferences
     */
    #[JsonProperty('conferences'), ArrayType(['mixed'])]
    public array $conferences;

    /**
     * @param array{
     *   apiId: string,
     *   conferences: array<mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiId = $values['apiId'];
        $this->conferences = $values['conferences'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
