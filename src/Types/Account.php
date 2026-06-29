<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

class Account extends JsonSerializableType
{
    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * @var ?string $authId
     */
    #[JsonProperty('auth_id')]
    public ?string $authId;

    /**
     * @var ?value-of<AccountAccountType> $accountType
     */
    #[JsonProperty('account_type')]
    public ?string $accountType;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?bool $isActive
     */
    #[JsonProperty('is_active')]
    public ?bool $isActive;

    /**
     * @var ?int $cpsLimit
     */
    #[JsonProperty('cps_limit')]
    public ?int $cpsLimit;

    /**
     * @var ?int $concurrentCallsLimit
     */
    #[JsonProperty('concurrent_calls_limit')]
    public ?int $concurrentCallsLimit;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   email?: ?string,
     *   authId?: ?string,
     *   accountType?: ?value-of<AccountAccountType>,
     *   enabled?: ?bool,
     *   isActive?: ?bool,
     *   cpsLimit?: ?int,
     *   concurrentCallsLimit?: ?int,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->authId = $values['authId'] ?? null;
        $this->accountType = $values['accountType'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->cpsLimit = $values['cpsLimit'] ?? null;
        $this->concurrentCallsLimit = $values['concurrentCallsLimit'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
