<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * A country with messaging numbers in stock.
 */
class NumberCountry extends JsonSerializableType
{
    /**
     * @var ?string $country ISO 3166-1 alpha-2 code of the country. Pass it as `country` to `GET /numbers/available`.
     */
    #[JsonProperty('country')]
    public ?string $country;

    /**
     * @var ?string $name English name of the country, for example `United States`.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<string> $types Number types in stock: `local`, `mobile`, `tollfree` or `shortcode`, or another lower-case inventory type.
     */
    #[JsonProperty('types'), ArrayType(['string'])]
    public ?array $types;

    /**
     * @var ?array<string> $capabilities Upper-case capabilities offered by numbers in stock in the country, for example `SMS`, `MMS` and `VOICE`. Not every number has every capability; filter with `capabilities` on `GET /numbers/available`.
     */
    #[JsonProperty('capabilities'), ArrayType(['string'])]
    public ?array $capabilities;

    /**
     * @param array{
     *   country?: ?string,
     *   name?: ?string,
     *   types?: ?array<string>,
     *   capabilities?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->country = $values['country'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->types = $values['types'] ?? null;
        $this->capabilities = $values['capabilities'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
