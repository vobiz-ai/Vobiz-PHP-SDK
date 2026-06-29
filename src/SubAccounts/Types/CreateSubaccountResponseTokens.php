<?php

namespace Vobiz\SubAccounts\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateSubaccountResponseTokens extends JsonSerializableType
{
    /**
     * @var string $accessToken
     */
    #[JsonProperty('access_token')]
    public string $accessToken;

    /**
     * @var string $refreshToken
     */
    #[JsonProperty('refresh_token')]
    public string $refreshToken;

    /**
     * @var string $tokenType
     */
    #[JsonProperty('token_type')]
    public string $tokenType;

    /**
     * @var int $expiresIn
     */
    #[JsonProperty('expires_in')]
    public int $expiresIn;

    /**
     * @param array{
     *   accessToken: string,
     *   refreshToken: string,
     *   tokenType: string,
     *   expiresIn: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->accessToken = $values['accessToken'];
        $this->refreshToken = $values['refreshToken'];
        $this->tokenType = $values['tokenType'];
        $this->expiresIn = $values['expiresIn'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
