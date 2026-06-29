<?php

namespace Vobiz\SubAccounts\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateSubaccountResponseAuthCredentials extends JsonSerializableType
{
    /**
     * @var string $authId
     */
    #[JsonProperty('auth_id')]
    public string $authId;

    /**
     * @var string $authToken
     */
    #[JsonProperty('auth_token')]
    public string $authToken;

    /**
     * @param array{
     *   authId: string,
     *   authToken: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->authId = $values['authId'];
        $this->authToken = $values['authToken'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
