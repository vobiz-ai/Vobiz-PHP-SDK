<?php

namespace Vobiz\SubAccounts\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class UpdateSubaccountResponse extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var mixed $email
     */
    #[JsonProperty('email')]
    public mixed $email;

    /**
     * @var mixed $phone
     */
    #[JsonProperty('phone')]
    public mixed $phone;

    /**
     * @var mixed $description
     */
    #[JsonProperty('description')]
    public mixed $description;

    /**
     * @var mixed $permissions
     */
    #[JsonProperty('permissions')]
    public mixed $permissions;

    /**
     * @var int $rateLimit
     */
    #[JsonProperty('rate_limit')]
    public int $rateLimit;

    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $parentAccountId
     */
    #[JsonProperty('parent_account_id')]
    public string $parentAccountId;

    /**
     * @var string $parentAuthId
     */
    #[JsonProperty('parent_auth_id')]
    public string $parentAuthId;

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
     * @var string $apiId
     */
    #[JsonProperty('api_id')]
    public string $apiId;

    /**
     * @var bool $emailVerified
     */
    #[JsonProperty('email_verified')]
    public bool $emailVerified;

    /**
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

    /**
     * @var string $created
     */
    #[JsonProperty('created')]
    public string $created;

    /**
     * @var string $modified
     */
    #[JsonProperty('modified')]
    public string $modified;

    /**
     * @var bool $isActive
     */
    #[JsonProperty('is_active')]
    public bool $isActive;

    /**
     * @var string $createdAt
     */
    #[JsonProperty('created_at')]
    public string $createdAt;

    /**
     * @var string $updatedAt
     */
    #[JsonProperty('updated_at')]
    public string $updatedAt;

    /**
     * @var mixed $lastUsed
     */
    #[JsonProperty('last_used')]
    public mixed $lastUsed;

    /**
     * @var string $account
     */
    #[JsonProperty('account')]
    public string $account;

    /**
     * @var string $resourceUri
     */
    #[JsonProperty('resource_uri')]
    public string $resourceUri;

    /**
     * @param array{
     *   name: string,
     *   rateLimit: int,
     *   id: string,
     *   parentAccountId: string,
     *   parentAuthId: string,
     *   authId: string,
     *   authToken: string,
     *   apiId: string,
     *   emailVerified: bool,
     *   enabled: bool,
     *   created: string,
     *   modified: string,
     *   isActive: bool,
     *   createdAt: string,
     *   updatedAt: string,
     *   account: string,
     *   resourceUri: string,
     *   email?: mixed,
     *   phone?: mixed,
     *   description?: mixed,
     *   permissions?: mixed,
     *   lastUsed?: mixed,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->email = $values['email'] ?? null;
        $this->phone = $values['phone'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->permissions = $values['permissions'] ?? null;
        $this->rateLimit = $values['rateLimit'];
        $this->id = $values['id'];
        $this->parentAccountId = $values['parentAccountId'];
        $this->parentAuthId = $values['parentAuthId'];
        $this->authId = $values['authId'];
        $this->authToken = $values['authToken'];
        $this->apiId = $values['apiId'];
        $this->emailVerified = $values['emailVerified'];
        $this->enabled = $values['enabled'];
        $this->created = $values['created'];
        $this->modified = $values['modified'];
        $this->isActive = $values['isActive'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->lastUsed = $values['lastUsed'] ?? null;
        $this->account = $values['account'];
        $this->resourceUri = $values['resourceUri'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
