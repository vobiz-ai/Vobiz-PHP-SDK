<?php

namespace Vobiz\Endpoints\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class UpdateEndpointRequest extends JsonSerializableType
{
    /**
     * @var string $alias
     */
    #[JsonProperty('alias')]
    public string $alias;

    /**
     * @var string $password
     */
    #[JsonProperty('password')]
    public string $password;

    /**
     * @param array{
     *   alias: string,
     *   password: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->alias = $values['alias'];
        $this->password = $values['password'];
    }
}
