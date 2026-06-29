<?php

namespace Vobiz\Credentials\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateCredentialRequest extends JsonSerializableType
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
     * @param array{
     *   username: string,
     *   password: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->username = $values['username'];
        $this->password = $values['password'];
    }
}
