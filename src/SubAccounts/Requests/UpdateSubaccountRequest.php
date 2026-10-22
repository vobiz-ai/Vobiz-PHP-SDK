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
     * @var ?bool $isActive Set to `false` to deactivate the sub-account. A deactivated sub-account no longer appears in list, retrieve, update or delete requests (`404`).
     */
    #[JsonProperty('is_active')]
    public ?bool $isActive;

    /**
     * @var ?bool $enabled Accepted but has no effect. Use `is_active` instead.
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
     *   isActive?: ?bool,
     *   enabled?: ?bool,
     *   kycMode?: ?value-of<UpdateSubaccountRequestKycMode>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->isActive = $values['isActive'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
        $this->kycMode = $values['kycMode'] ?? null;
    }
}
