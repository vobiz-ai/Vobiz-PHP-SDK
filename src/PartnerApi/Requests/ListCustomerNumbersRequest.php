<?php

namespace Vobiz\PartnerApi\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListCustomerNumbersRequest extends JsonSerializableType
{
    /**
     * @var ?string $search Substring match against the E.164 number.
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
     *   search?: ?string,
     *   page?: ?int,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->search = $values['search'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }
}
