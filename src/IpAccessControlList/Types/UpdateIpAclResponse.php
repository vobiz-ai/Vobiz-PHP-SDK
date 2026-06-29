<?php

namespace Vobiz\IpAccessControlList\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class UpdateIpAclResponse extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $accountId
     */
    #[JsonProperty('account_id')]
    public string $accountId;

    /**
     * @var string $ipAddress
     */
    #[JsonProperty('ip_address')]
    public string $ipAddress;

    /**
     * @var string $description
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var bool $enabled
     */
    #[JsonProperty('enabled')]
    public bool $enabled;

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
     * @param array{
     *   id: string,
     *   accountId: string,
     *   ipAddress: string,
     *   description: string,
     *   enabled: bool,
     *   createdAt: string,
     *   updatedAt: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->accountId = $values['accountId'];
        $this->ipAddress = $values['ipAddress'];
        $this->description = $values['description'];
        $this->enabled = $values['enabled'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
