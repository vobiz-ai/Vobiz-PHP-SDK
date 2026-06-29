<?php

namespace Vobiz\SubAccounts\Requests;

use Vobiz\Core\Json\JsonSerializableType;
use Vobiz\Core\Json\JsonProperty;
use Vobiz\SubAccounts\Types\UpdateSubaccountRequestKycMode;

class UpdateSubaccountRequest extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?bool $enabled
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @var ?value-of<UpdateSubaccountRequestKycMode> $kycMode Change the verification mode. Promoting to `customer_use` requires the sub-account to have an `email`.
     */
    #[JsonProperty('kyc_mode')]
    public ?string $kycMode;

    /**
     * @param array{
     *   name?: ?string,
     *   enabled?: ?bool,
     *   kycMode?: ?value-of<UpdateSubaccountRequestKycMode>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->kycMode = $values['kycMode'] ?? null;
    }
}
