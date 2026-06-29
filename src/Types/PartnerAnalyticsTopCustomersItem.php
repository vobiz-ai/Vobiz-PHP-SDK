<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class PartnerAnalyticsTopCustomersItem extends JsonSerializableType
{
    /**
     * @var ?string $authId
     */
    #[JsonProperty('auth_id')]
    public ?string $authId;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?int $calls
     */
    #[JsonProperty('calls')]
    public ?int $calls;

    /**
     * @var ?float $cost
     */
    #[JsonProperty('cost')]
    public ?float $cost;

    /**
     * @param array{
     *   authId?: ?string,
     *   name?: ?string,
     *   calls?: ?int,
     *   cost?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authId = $values['authId'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->calls = $values['calls'] ?? null;
        $this->cost = $values['cost'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
