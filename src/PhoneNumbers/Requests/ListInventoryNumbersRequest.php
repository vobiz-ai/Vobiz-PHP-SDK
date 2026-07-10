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
     * @var ?string $exclude One or more E.164 prefixes to remove from results. Include the country code (e.g. "9180" for India +91 80-series, "1415" for US +1 415); a leading "+" is optional. Matched against the full E.164 form, so it works for any country. Accepts a comma-separated list ("9180,9192") or repeated params ("exclude=9180&exclude=9192"), and the two forms can be combined. It is ANDed with all other filters, so it takes priority over `search`; duplicates are de-duplicated silently and `total` reflects the filtered result set.
     */
    public ?string $exclude;

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
     *   exclude?: ?string,
     *   page?: ?int,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->country = $values['country'] ?? null;
        $this->search = $values['search'] ?? null;
        $this->exclude = $values['exclude'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }
}
