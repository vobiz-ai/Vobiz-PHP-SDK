<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;
use DateTime;
use Vobiz\Core\Types\Date;

/**
 * Countries where you can buy messaging numbers, from a snapshot of the inventory.
 */
class NumberCountries extends JsonSerializableType
{
    /**
     * @var ?array<NumberCountry> $countries Countries with numbers in stock. Empty while `ready` is `false`.
     */
    #[JsonProperty('countries'), ArrayType([NumberCountry::class])]
    public ?array $countries;

    /**
     * @var ?DateTime $updatedAt When the stock snapshot was last refreshed (ISO 8601). `null` until the first snapshot is built.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var ?bool $ready `true` once the stock snapshot has been built. While `false`, `countries` is empty and `updatedAt` is `null`; retry after a few seconds.
     */
    #[JsonProperty('ready')]
    public ?bool $ready;

    /**
     * @param array{
     *   countries?: ?array<NumberCountry>,
     *   updatedAt?: ?DateTime,
     *   ready?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->countries = $values['countries'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->ready = $values['ready'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
