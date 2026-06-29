<?php

namespace Vobiz\Endpoints\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateEndpointResponse extends JsonSerializableType
{
    /**
     * @var string $alias
     */
    #[JsonProperty('alias')]
    public string $alias;

    /**
     * @var string $endpointId
     */
    #[JsonProperty('endpoint_id')]
    public string $endpointId;

    /**
     * @var string $username
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @param array{
     *   alias: string,
     *   endpointId: string,
     *   username: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->alias = $values['alias'];
        $this->endpointId = $values['endpointId'];
        $this->username = $values['username'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
