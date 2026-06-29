<?php

namespace Vobiz\PhoneNumbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListInventoryNumbersRequest extends JsonSerializableType
{
    /**
     * @var ?string $country Filter by country code (e.g., "US", "IN").
     */
    public ?string $country;

    /**
     * @var ?string $search Substring match against the E.164 number (e.g., "80" matches "+918065...").
     */
    public ?string $search;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $perPage
     */
    public ?int $perPage;

    /**
     * @param array{
     *   country?: ?string,
     *   search?: ?string,
     *   page?: ?int,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->country = $values['country'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }
}
