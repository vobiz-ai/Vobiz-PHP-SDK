<?php

namespace Vobiz\Credentials\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class UpdateCredentialRequest extends JsonSerializableType
{
    /**
     * @var string $password
     */
    #[JsonProperty('password')]
    public string $password;

    /**
     * @param array{
     *   password: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->password = $values['password'];
    }
}
