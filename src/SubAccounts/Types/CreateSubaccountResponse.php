<?php

namespace Vobiz\SubAccounts\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class CreateSubaccountResponse extends JsonSerializableType
{
    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var CreateSubaccountResponseSubAccount $subAccount
     */
    #[JsonProperty('sub_account')]
    public CreateSubaccountResponseSubAccount $subAccount;

    /**
     * @var CreateSubaccountResponseAuthCredentials $authCredentials
     */
    #[JsonProperty('auth_credentials')]
    public CreateSubaccountResponseAuthCredentials $authCredentials;

    /**
     * @var CreateSubaccountResponseTokens $tokens
     */
    #[JsonProperty('tokens')]
    public CreateSubaccountResponseTokens $tokens;

    /**
     * @param array{
     *   message: string,
     *   subAccount: CreateSubaccountResponseSubAccount,
     *   authCredentials: CreateSubaccountResponseAuthCredentials,
     *   tokens: CreateSubaccountResponseTokens,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
        $this->subAccount = $values['subAccount'];
        $this->authCredentials = $values['authCredentials'];
        $this->tokens = $values['tokens'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
