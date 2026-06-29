<?php

namespace Vobiz\PartnerApi\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\Core\Types\ArrayType;

class GetPartnerDashboardResponseAccounts extends JsonSerializableType
{
    /**
     * @var int $total
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @var int $active
     */
    #[JsonProperty('active')]
    public int $active;

    /**
     * @var array<GetPartnerDashboardResponseAccountsCustomersItem> $customers
     */
    #[JsonProperty('customers'), ArrayType([GetPartnerDashboardResponseAccountsCustomersItem::class])]
    public array $customers;

    /**
     * @param array{
     *   total: int,
     *   active: int,
     *   customers: array<GetPartnerDashboardResponseAccountsCustomersItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->total = $values['total'];
        $this->active = $values['active'];
        $this->customers = $values['customers'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
