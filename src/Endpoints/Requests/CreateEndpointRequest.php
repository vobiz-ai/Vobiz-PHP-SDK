<?php

namespace Vobiz\Endpoints\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateEndpointRequest extends JsonSerializableType
{
    /**
     * @var string $username
     */
    #[JsonProperty('username')]
    public string $username;

    /**
     * @var string $password
     */
    #[JsonProperty('password')]
    public string $password;

    /**
     * @var string $alias
     */
    #[JsonProperty('alias')]
    public string $alias;

    /**
     * @var int $application
     */
    #[JsonProperty('application')]
    public int $application;

    /**
     * @param array{
     *   username: string,
     *   password: string,
     *   alias: string,
     *   application: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->username = $values['username'];
        $this->password = $values['password'];
        $this->alias = $values['alias'];
        $this->application = $values['application'];
    }
}
