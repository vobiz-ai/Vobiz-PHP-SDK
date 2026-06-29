<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use DateTime;
use Vobiz\Core\Types\Date;

class Trunk extends JsonSerializableType
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
     * @var ?value-of<TrunkTrunkType> $trunkType
     */
    #[JsonProperty('trunk_type')]
    public ?string $trunkType;

    /**
     * @var ?string $sipDomain
     */
    #[JsonProperty('sip_domain')]
    public ?string $sipDomain;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('created_at'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @param array{
     *   id?: ?string,
     *   name?: ?string,
     *   trunkType?: ?value-of<TrunkTrunkType>,
     *   sipDomain?: ?string,
     *   enabled?: ?bool,
     *   createdAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->trunkType = $values['trunkType'] ?? null;
        $this->sipDomain = $values['sipDomain'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
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
