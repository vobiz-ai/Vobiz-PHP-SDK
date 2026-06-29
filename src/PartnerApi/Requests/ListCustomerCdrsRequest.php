<?php

namespace Vobiz\PartnerApi\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use DateTime;
use Vobiz\PartnerApi\Types\ListCustomerCdrsRequestCallDirection;
use Vobiz\PartnerApi\Types\ListCustomerCdrsRequestStatus;

class ListCustomerCdrsRequest extends JsonSerializableType
{
    /**
     * @var ?DateTime $startDate
     */
    public ?DateTime $startDate;

    /**
     * @var ?DateTime $endDate
     */
    public ?DateTime $endDate;

    /**
     * @var ?value-of<ListCustomerCdrsRequestCallDirection> $callDirection
     */
    public ?string $callDirection;

    /**
     * @var ?value-of<ListCustomerCdrsRequestStatus> $status
     */
    public ?string $status;

    /**
     * @var ?int $minDuration
     */
    public ?int $minDuration;

    /**
     * @var ?string $hangupCause
     */
    public ?string $hangupCause;

    /**
     * @var ?int $perPage
     */
    public ?int $perPage;

    /**
     * @param array{
     *   startDate?: ?DateTime,
     *   endDate?: ?DateTime,
     *   callDirection?: ?value-of<ListCustomerCdrsRequestCallDirection>,
     *   status?: ?value-of<ListCustomerCdrsRequestStatus>,
     *   minDuration?: ?int,
     *   hangupCause?: ?string,
     *   perPage?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->startDate = $values['startDate'] ?? null;
        $this->endDate = $values['endDate'] ?? null;
        $this->callDirection = $values['callDirection'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->minDuration = $values['minDuration'] ?? null;
        $this->hangupCause = $values['hangupCause'] ?? null;
        $this->perPage = $values['perPage'] ?? null;
    }
}
