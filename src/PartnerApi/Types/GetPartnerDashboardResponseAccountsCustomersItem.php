<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class GetPartnerDashboardResponseAccountsCustomersItem extends JsonSerializableType
{
    /**
     * @var string $authId
     */
    #[JsonProperty('auth_id')]
    public string $authId;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $email
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var string $phone
     */
    #[JsonProperty('phone')]
    public string $phone;

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
     * @param array{
     *   authId: string,
     *   name: string,
     *   email: string,
     *   phone: string,
     *   isActive: bool,
     *   createdAt: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->authId = $values['authId'];
        $this->name = $values['name'];
        $this->email = $values['email'];
        $this->phone = $values['phone'];
        $this->isActive = $values['isActive'];
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
