<?php

namespace Vobiz\PhoneNumbers\Requests;

use Vobiz\Core\Json\JsonSerializableType;

class ListNumbersRequest extends JsonSerializableType
{
    /**
     * @var ?int $page Page number, starting at 1
     */
    public ?int $page;

    /**
     * @var ?int $perPage Number of phone numbers to return per page
     */
    public ?int $perPage;

    /**
     * @var ?string $search Filter by phone number. Include the country code and URL-encode a leading plus sign.
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
