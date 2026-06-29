<?php

namespace Vobiz\Types;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;

class Balance extends JsonSerializableType
{
    /**
     * @var ?string $authId
     */
    #[JsonProperty('auth_id')]
    public ?string $authId;

    /**
     * @var ?string $balance
     */
    #[JsonProperty('balance')]
    public ?string $balance;

    /**
     * @var ?string $currency
     */
    #[JsonProperty('currency')]
    public ?string $currency;

    /**
     * @var ?bool $autoRecharge
     */
    #[JsonProperty('auto_recharge')]
    public ?bool $autoRecharge;

    /**
     * @param array{
     *   authId?: ?string,
     *   balance?: ?string,
     *   currency?: ?string,
     *   autoRecharge?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authId = $values['authId'] ?? null;
        $this->balance = $values['balance'] ?? null;
        $this->currency = $values['currency'] ?? null;
        $this->autoRecharge = $values['autoRecharge'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
