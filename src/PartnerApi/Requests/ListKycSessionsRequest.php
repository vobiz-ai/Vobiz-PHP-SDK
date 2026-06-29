<?php

namespace Vobiz\PartnerApi\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\PartnerApi\Types\ListKycSessionsRequestStatus;

class ListKycSessionsRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListKycSessionsRequestStatus> $status
     */
    public ?string $status;

    /**
     * @var ?string $accountAuthId
     */
    public ?string $accountAuthId;

    /**
     * @var ?int $page
     */
    public ?int $page;

    /**
     * @var ?int $size
     */
    public ?int $size;

    /**
     * @param array{
     *   status?: ?value-of<ListKycSessionsRequestStatus>,
     *   accountAuthId?: ?string,
     *   page?: ?int,
     *   size?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->accountAuthId = $values['accountAuthId'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->size = $values['size'] ?? null;
    }
}
