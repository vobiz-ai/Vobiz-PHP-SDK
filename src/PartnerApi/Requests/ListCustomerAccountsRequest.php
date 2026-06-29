<?php

namespace Vobiz\PartnerApi\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListCustomerAccountsRequest extends JsonSerializableType
{
    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $perPage
     */
    public ?int $perPage;

    /**
     * @var ?string $search Substring match on name or email.
     */
    public ?string $search;

    /**
     * @param array{
     *   page?: ?int,
     *   perPage?: ?int,
     *   search?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->page = $values['page'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
        $this->search = $values['search'] ?? null;
    }
}
