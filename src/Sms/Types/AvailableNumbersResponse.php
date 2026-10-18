<?php

namespace Vobiz\Sms\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

/**
 * One page of inventory search results.
 */
class AvailableNumbersResponse extends JsonSerializableType
{
    /**
     * @var ?array<AvailableNumber> $numbers Numbers that match your filters, at most 10 per search. Empty array when nothing matches, and for `country=IN`.
     */
    #[JsonProperty('numbers'), ArrayType([AvailableNumber::class])]
    public ?array $numbers;

    /**
     * @var ?int $page The zero-based page index you requested, echoed back.
     */
    #[JsonProperty('page')]
    public ?int $page;

    /**
     * @var ?int $limit Page size applied to this search, at most `10`.
     */
    #[JsonProperty('limit')]
    public ?int $limit;

    /**
     * @var ?bool $hasMore Reserved for pagination; `false` on every response. Run a new search with different filters to see other numbers.
     */
    #[JsonProperty('hasMore')]
    public ?bool $hasMore;

    /**
     * @var ?string $hint Guidance returned only for `country=IN`, explaining that Indian traffic is sent from DLT-registered sender IDs rather than purchased numbers. Absent for every other country.
     */
    #[JsonProperty('hint')]
    public ?string $hint;

    /**
     * @param array{
     *   numbers?: ?array<AvailableNumber>,
     *   page?: ?int,
     *   limit?: ?int,
     *   hasMore?: ?bool,
     *   hint?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->numbers = $values['numbers'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->hasMore = $values['hasMore'] ?? null;
        $this->hint = $values['hint'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
