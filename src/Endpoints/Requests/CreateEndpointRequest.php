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
     * @var ?string $appId ID of the application that handles calls from this endpoint. Application IDs are 17-digit strings; send them as JSON strings.
     */
    #[JsonProperty('app_id')]
    public ?string $appId;

    /**
     * @var ?int $application Not read by the API. Application IDs exceed the range of a JSON integer, and the endpoint is created without an application. Send `app_id` instead.
     */
    #[JsonProperty('application')]
    public ?int $application;

    /**
     * @param array{
     *   username: string,
     *   password: string,
     *   alias: string,
     *   appId?: ?string,
     *   application?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->username = $values['username'];
        $this->password = $values['password'];
        $this->alias = $values['alias'];
        $this->appId = $values['appId'] ?? null;
        $this->application = $values['application'] ?? null;
    }
}
